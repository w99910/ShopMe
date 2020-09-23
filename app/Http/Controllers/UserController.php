<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Laravolt\Avatar\Avatar;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function export(){
        return Excel::download(new UsersExport(),'users.xlsx');
    }
    public function index()
    {
       return view('auth.login');
    }

    public function showSignUp(){
        return view('auth.register');
    }
    public function signIn(Request $request){
    $validate=$request->validate([
   'email' => 'required|email',
   'password' =>'required',
    ]);

    if($validate){
    $credentials=$request->only('email','password');
    $remember=$this->isRemember($request->remember);

        if (Auth::attempt($credentials)){
            $user=User::where('email',$credentials['email'])->first();
            Auth::login($user,$remember);
            return redirect(User::isAdmin($user)?User::Login_as_admin:User::Login_as_user);
        }
    Session::flash('message', 'Incorrect Email Or Password.Please Try Again.');
    return redirect()->back();
        }
    }
    public function redirectToProvider($name)
    {
        return Socialite::driver($name)->redirect();


    }
    public function handleProviderCallback($name)
    {
        $user = Socialite::driver($name)->user();
       $oauth_user=User::where('email',$user->getEmail())->first();

      if($oauth_user === null){
          $email=$user->getEmail();
           if ($user->getName()===null) {
               $auth_user=User::create(['name'=>$user->getNickname(),'email'=>$user->getEmail(),'password'=>bcrypt('12345678')]);
               return view('auth.passwords.password_oauth', compact('auth_user'));
           }
           else {
               $auth_user=User::create(['name'=>$user->getName(),'email'=>$user->getEmail(),'password'=>bcrypt('12345678')]);
               return view('auth.passwords.password_oauth', compact('auth_user'));
           }
      } else {
          Auth::login($oauth_user);
          return redirect(User::isAdmin($oauth_user)?User::Login_as_admin:User::Login_as_user);
      }

    }
    public function isRemember($remember){
        return $remember !== null;
    }

    public function create(Request $request)
    {
       $validate=$request->validate([
           'name'=>'required|string',
           'email'=>'unique:users|required|email',
           'password' =>'confirmed|min:8|max:12|required',
       ]);
       if($validate){
           $user=User::firstOrCreate(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password)]);
//               $avator=new Avatar();
//           \Storage::put($user->name.'.png',Avatar::create($user->name)->toBase64());
//           $user->profile_url=$user->name.'.png';
//           $user->save();
           Auth::login($user);
           toast('Welcome, '.$user->name,'success');
          return redirect()->route('home');
       }
    }
}
