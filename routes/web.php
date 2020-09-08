<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/admin_home','AdminController@index')->name('admin_home');
    Route::view('/page/user','page.user')->name('page.user');
    Route::view('/page/product','page.product')->name('page.product');
});
Route::get('/signin','UserController@index')->name('signin');
Route::post('/signin','UserController@signIn')->name('signin');
Route::get('/signup','UserController@showSignUp')->name('signup');
Route::post('/signup','UserController@create')->name('signup');


Route::get('/hello',function(){
    $users=\App\User::all();
    foreach ($users as $user){
        echo $user->name ."</br>";
    }
});

 Route::post('page/testing/{id}','UserController@editing');

