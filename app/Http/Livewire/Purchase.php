<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Product;
use Livewire\Component;

class Purchase extends Component
{
    public $suggestions=[];
    public $product;
    public $carts=[];
    protected $listeners=['refresh'=>'$refresh'];
    public function render()
    {
        return view('livewire.purchase');
    }
    public function mount(Product $product)
    {
        $this->product = $product;
        $user = auth()->user();
       $carts=$user->carts;
      $this->carts=$carts;
     $this->suggestions=Product::inRandomOrder()->take(5)->get();

    }
    public function addCart($id,$price){
       $user=auth()->user();

       $cart=Cart::create(['user_id'=>$user->id,'product_id'=>$id,'price'=>$price]);

          $carts=$user->carts;
       $this->carts=$carts;
        $this->emitSelf('refresh');
    }
    public function deleteCart($id){
        $user=auth()->user();
        $selectedcart=Cart::find($id);
        $selectedcart->delete();
        $this->emitSelf('refresh');
    }

}
