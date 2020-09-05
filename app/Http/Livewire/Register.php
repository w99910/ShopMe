<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
//    public function updated(){
//        $this->validate([
//           'name' => 'required',
//           'email' => 'required|email',
//           'password'=>'confirmed|required|min:5|max:12'
//        ]);
//    }
    public function updatedName(){
 $this->validate([
     'name' => 'required',
 ]);
    }
    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email',
        ]);
    }
    public function updatedPassword(){
    $this->validate([
        'password'=>'min:8|max:12|required',
    ]);
}
    public function updatedPasswordConfirmation(){
        $this->validate([
            'password_confirmation'=>'required|same:password'
        ]);
    }
    public function render()
    {
        return view('livewire.register');
    }
}
