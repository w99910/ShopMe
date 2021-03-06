<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

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

   if (Auth::attempt($credentials)){

       $user=User::where('email',$credentials['email'])->first();

       Auth::login($user);

       return redirect(User::isAdmin($user)?User::Login_as_admin:User::Login_as_user);
   }
    Session::flash('message', 'Incorrect Email Or Password.Please Try Again.');
    return redirect()->back();
}

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
          Auth::login($user);
          return redirect()->route('home');
       }
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
