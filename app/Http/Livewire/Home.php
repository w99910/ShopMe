<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Home extends Component
{
    public $carts=[];
    public $select;
    public $products;

    protected $listeners=['new'=>'newest','discount'=>'discount','home'=>'home'];
    public function home(){
        $this->products=Product::all();
        $this->emit('refresh');
    }
    public function purchase_page(Product $product){
        return redirect('/purchase/'.$product->id);
    }
    public function deleteCart($id){
        $user=auth()->user();
        $selectedcart=Cart::find($id);
        $selectedcart->delete();
        $this->emitSelf('refresh');
    }
    public function newest(){
        $products=Product::whereHas('categories',function(Builder $query){
            $query->where('name','like','%'.$this->select.'%');
        })->get();
        $now=Carbon::today()->subDays(5);
        $this->products=$products->intersect(Product::where('created_at','>=',$now)->get());
        return redirect()->back();
    }
    public function updatedSelect(){
        $this->products=Product::whereHas('categories',function(Builder $query){
           $query->where('name','like','%'.$this->select.'%');
        })->get();
    }
    public function render()
    {
        return view('livewire.home',[
            'categories'=>Category::all(),
        ]);
    }
    public function mount(){
        $this->products=Product::all();
        $user = auth()->user();
        $carts=$user->carts;
        $this->carts=$carts;
    }
    public function discount(){
        $this->products=Product::has('discounts')->get();
        $this->emit('refresh');
    }

}
