<?php

namespace App\Http\Livewire;

use App\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $carts;
    public $selectcart;
    public $total_price;

    public function render()
    {
        return view('livewire.checkout');
    }
    public function mount(){

        $user=auth()->user();
        $carts=$user->carts;
        $this->carts=$carts;
        foreach ($this->carts as $cart){
            $this->total_price += $cart->total_price;
        }

    }
    public function deleteCart(Cart $cart){
        $this->selectcart=Cart::where('id',$cart->id)->first();
        $this->selectcart->delete();
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
        $this->refreshCart();
    }
    public function refreshCart(){

        $user=auth()->user();
        $user->refresh();
        $this->carts=$user->carts;
        $this->total_price=0;
        foreach ($this->carts as $cart){
            $this->total_price += $cart->total_price;
        }
//        $this->emit('refresh');
    }
}
