<?php

namespace App\Http\Livewire;

use App\Exports\ProductsExport;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ProductPage extends Component
{
    use WithPagination;
    public $count=0;
    public $confirmid;
    public $search='';
    protected $listeners=['refreshing'=>'$refresh' ,'CreatingNewPost'=>'createPost'];

    public function export(){
//        return redirect()->route('product_export');

     $this->redirectRoute('product_export');

    }

    public function updatingSearch()
        {
        $this->resetPage();
        }
    public function createPost($data)
         {
        $ex=explode(',', $data['image']);
        $decoded=base64_decode($ex[1]);
        $quantity=$data['quantity'];
        $product=Product::create([
           'name'=>$data['name'],
            'price'=> (float)$data['price'],
            'available' => true,
            'quantity'=>$quantity,
        ]);
//             'image_path' => 'product.'.$data['name'].'.'.$data['extension'],
        $cate_id=$data['select'];
        $product->categories()->attach($cate_id);
        Storage::disk('google')->put('product.'.$product->name.'.'.$data['extension'],$decoded);
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo('product.'.$product->name.'.'.$data['extension'], PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo('product.'.$product->name.'.'.$data['extension'], PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!
        //return $contents->where('type', '=', 'dir'); // directories
        $service = Storage::cloud()->getAdapter()->getService();
        $permission = new \Google_Service_Drive_Permission();
        $permission->setRole('reader');
        $permission->setType('anyone');
        $permission->setAllowFileDiscovery(false);
        $permissions = $service->permissions->create($file['basename'], $permission);

        $url=Storage::cloud()->url($file['path']);
        $product->image_path=$url;
        $product->save();
        $this->emit('alerting','Successfully Created');
        session()->flash('toast', 'Proudct '.$product->name.  ' successfully created.');

         }
    public function render()
        {
        return view('livewire.product-page',[
            'products' => Product::where('name', 'like', '%'.$this->search.'%')->paginate(7),
        ]);
        }


    public function unconfirmed($id){
                   $this->confirmid=null;
        }

    public function confirm($id){
               $this->confirmid=$id;
        }
    public function delete($id){
        $product=Product::find($id);
           $product->delete();
        session()->flash('message', 'Proudct '.$product->name.  ' successfully deleted.');
                $this->resetPage();
            return redirect()->back();
        }



    public function paginationView()
        {
        return 'custom-pagination';
        }
}
