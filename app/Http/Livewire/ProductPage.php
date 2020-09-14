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
            'image_path' => 'product.'.$data['name'].'.'.$data['extension'],
            'available' => true,
            'quantity'=>$quantity,
        ]);
        $cate_id=$data['select'];
        $product->categories()->attach($cate_id);
        Storage::disk('public')->put('product.'.$product->name.'.'.$data['extension'],$decoded);
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
