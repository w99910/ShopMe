<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

  public function updated(){
      $this->validate([
         'email' => 'email|required',
          'password'=>'required'
      ]);


  }
    public function render()
    {
        return view('livewire.login');
    }
}
