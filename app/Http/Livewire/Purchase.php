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
    public $selectcart;
    protected $listeners=['refreshing'=>'$refresh','addCart'=>'add'];
    public function render()
    {
        return view('livewire.purchase');
    }
    public function mount(Product $product)
    {
        $this->selectcart=new Cart();
        $this->product = $product;
        $user = auth()->user();
        $carts=$user->carts;
        $this->carts=$carts;
        $this->suggestions=Product::inRandomOrder()->take(5)->get();
    }
    public function add(Product $product){
        $user=auth()->user();
       $valid=Cart::where('user_id',$user->id)->where('product_id',$product->id)->get();

     if($valid->isEmpty())
     {
         $cart=Cart::create(['user_id'=>$user->id,'product_id'=>$product->id,'price'=>$product->price]); }
     else {
         $cart=Cart::where('user_id',$user->id)->where('product_id',$product->id)->first();

         $quantity=$cart->quantity;
         $cart->quantity=$quantity+1;
         $cart->save();
     }
        $this->refreshCart();
    }
    public function increment(Cart $cart){
              $quantity=$cart->quantity;
              $cart->quantity=$quantity+1;
              $cart->save();
              $this->refreshCart();
    }
    public function decrement(Cart $cart){
              $quantity=$cart->quantity;
              if($quantity!==1){
                  $cart->quantity=$quantity-1;
                  $cart->save();
              }

//              dd($cart->quantity);
       $this->refreshCart();
    }
    public function purchase_page(Product $product){
        return redirect('/purchase/'.$product->id);
    }
    public function addCart($id,$price){
       $user=auth()->user();
       $cart=Cart::create(['user_id'=>$user->id,'product_id'=>$id,'price'=>$price]);

        $this->refreshCart();
    }
    public function deleteCart(Cart $cart){
        $this->selectcart=Cart::where('id',$cart->id)->first();
        $this->selectcart->delete();
       $this->refreshCart();
    }
    public function refreshCart(){
        $user=auth()->user();
        $user->refresh();
        $this->carts=$user->carts;
        $this->emit('refresh');
    }

}
