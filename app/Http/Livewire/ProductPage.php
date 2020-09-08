<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

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
      protected $listeners=['refreshing'=>'$refresh'];
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
