<?php

namespace App\Http\Livewire;

use App\Cart;
use Livewire\Component;

class Testing extends Component
{

    public $carts;
    public function render()
    {
        return view('livewire.testing');
    }
    public function add_cart($id){
              $user=auth()->user();
              Cart::create(['product_id'=>$id,'user_id'=>$user->id,'price'=>200]);
              $this->carts=$user->carts;
               $this->emit('refresh');
    }
    public function delete($id){
        $cart=Cart::find($id);
        $cart->delete();
        $this->carts=auth()->user()->carts;
        $this->emit('refresh');
    }

    public function mount(){
        $user=auth()->user();
        $this->carts=$user->carts;
    }
}
