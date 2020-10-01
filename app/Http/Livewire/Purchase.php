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
    public $text;
    public $messages=[];
    public function getListeners()
    {
        return [
            "echo-private:message,.message-event.".auth()->id() => 'updateMessage',
            'refreshing'=>'$refresh',
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
        $this->messages=\App\Message::where('from',auth()->id())->orWhere('to',auth()->id())->get();
    }
    public function add($id,$price){
        $user=auth()->user();
        $valid=Cart::where('user_id',$user->id)->where('product_id',$id)->get();

        if($valid->isEmpty()) {
            $cart = Cart::create(['user_id' => $user->id, 'product_id' => $id, 'price' => $price]);
        }
        else {
            $cart=Cart::where('user_id',$user->id)->where('product_id',$id)->first();

            $quantity=$cart->quantity;
            $cart->quantity=$quantity+1;
            $cart->save();
        }
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

//              dd($cart->quantity);
        $this->refreshCart();
    }
    public function purchase_page($id){
        return redirect('/purchase/'.$id);
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
