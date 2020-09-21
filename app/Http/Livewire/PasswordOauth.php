<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use mysql_xdevapi\Exception;

class PasswordOauth extends Component
{
  public $user;
    public $password;
    public $confirm_password;
    public function render()
    {
        return view('livewire.password-oauth');
    }
    public function mount(User $user){

       $this->user=$user;


    }
    public function updatedPassword()
    {
        $this->validate([
            'password' => 'min:8|max:12|required',
        ]);
    }
    public function updatedConfirmPassword(){
        $this->validate([
            'confirm_password'=>'required|same:password'
        ]);

    }
    public function login()
    {
        try {
            $user = $this->user;
            $user->password = bcrypt($this->password);
            $user->save();
            \Auth::login($user);
            return redirect(User::isAdmin($user) ? User::Login_as_admin : User::Login_as_user);

        } catch (Exception $e) {
            print($e);
        }
    }
}
