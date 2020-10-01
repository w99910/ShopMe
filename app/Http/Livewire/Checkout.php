<?php

namespace App\Http\Livewire;

use App\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $carts;
    public $selectcart;
    public $total_price;
    public $text;
    public $messages=[];
    public function getListeners()
    {
        return [
            "echo-private:message,.message-event.".auth()->id() => 'updateMessage',
        ];
    }
    public function updateMessage($message){

        $this->messages=\App\Message::where('from',auth()->id())->orWhere('to',auth()->id())->get();
    }
    public function sendMessage(){
        $id=auth()->id();
        if($this->text==''){
            return null;
        }
        else {
            $send_message = \App\Message::create(['from' => $id, 'to' => 7, 'message' => $this->text]);
            broadcast(new \App\Events\Message($send_message));
            $this->messages = \App\Message::where('from', auth()->id())->orWhere('to', auth()->id())->get();

            $this->text = '';
        }
    }
    public function render()
    {
        return view('livewire.checkout');
    }
    public function mount(){
        $this->messages=\App\Message::where('from',auth()->id())->orWhere('to',auth()->id())->get();
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
    public function increment($id){
        $cart=Cart::find($id);
        $quantity=$cart->quantity;
        $cart->quantity=$quantity+1;
        $cart->save();
        $this->refreshCart();
    }
    public function decrement($id){
        $cart=Cart::find($id);
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
