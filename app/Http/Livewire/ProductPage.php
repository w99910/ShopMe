<?php

namespace App\Http\Livewire;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProductPage extends Component
{



    use WithPagination;
    public $count=0;
    public $confirmid;
    public $search='';
    public function updatingSearch()
        {
        $this->resetPage();
        }
        protected $listeners=['refreshing'=>'$refresh' ,'CreatingNewPost'=>'createPost'];
    public function createPost($data)
    {
        $ex=explode(',', $data['image']);
        $decoded=base64_decode($ex[1]);

        $product=Product::create([
           'name'=>$data['name'],
            'price'=>floatval($data['price']),
            'image_path' => 'product.'.$data['name'].'.'.$data['extension'],
            'available' => true,
        ]);
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
    public function unconfirm($id){
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


    public function mount(){
        }
    public function paginationView()
        {
        return 'custom-pagination';
        }
}
