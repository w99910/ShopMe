<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;

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
        $valid = $this->validate([
            'password' => 'min:8|max:12|required',
            'confirm_password' => 'required|same:password'
        ]);
        if ($valid) {
            try {
                $user = $this->user;
                $user->password = bcrypt($this->password);
                $user->save();
                \Auth::login($user);
                toast('Welcome, '.$user->name,'success');
                return redirect(User::isAdmin($user) ? User::Login_as_admin : User::Login_as_user);

            } catch (Exception $e) {
               toast('Please try again','error');
               return back();
            }
        }
        toast('Please try again','error');
        return back();
    }
}
