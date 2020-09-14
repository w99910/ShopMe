<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

  public function updatedEmail(){
      $this->validate([
         'email' => 'required',
      ]);
  }
  public function updatedPassword(){
      $this->validate([
          'password'=>'required'
      ]);
  }
    public function render()
    {
        return view('livewire.login');
    }
}
