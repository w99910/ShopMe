<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
     return view('intro');
});
Route::get('/checkout',[\App\Http\Controllers\CartController::class,'index'])->name('checkout');
Route::post('/checkout',[\App\Http\Controllers\CartController::class,'processCheckout'])->name('checkout.process');
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
Route::get('/purchase/{product}',[\App\Http\Controllers\ProductController::class,'purchase']);

Route::get('/hello',function(){
    $users=\App\User::all();
    foreach ($users as $user){
        echo $user->name ."</br>";
    }
});

Route::post('page/testing/{id}','ProductController@editing');
Route::get('/export/user_excel',[\App\Http\Controllers\UserController::class,'export'])->name('user_export');
Route::get('/export/product_excel',[\App\Http\Controllers\ProductController::class,'export'])->name('product_export');
Route::get('/2factor',function()
    {
        $user=\App\User::find(1);
        $google2fa=new \PragmaRX\Google2FAQRCode\Google2FA();
        $secretKey = $google2fa->generateSecretKey();
        $inlineUrl=$google2fa->getQRCodeInline('name','zlintun001@gmail.com',$secretKey);
        return view('auth.2fa')->with('image',$inlineUrl);
    });

Route::group(['prefix' => '2fa'],function() {
    Route::get('/', [\App\Http\Controllers\PasswordSecurityController::class,'index'])->name('show2fa');
    Route::post('/enable2fa', [\App\Http\Controllers\PasswordSecurityController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/disable2fa', [\App\Http\Controllers\PasswordSecurityController::class, 'disable2fa'])->name('disable2fa');
    Route::post('/generate2fa', [\App\Http\Controllers\PasswordSecurityController::class, 'generate2fa'])->name('generate2faSecret');
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

Route::get('/test_middleware', function () {
    return view('auth.2fa_verify');
    })->middleware('2fa');

Route::view('intro','intro');

Route::get('login/{name}', [\App\Http\Controllers\UserController::class, 'redirectToProvider']);
Route::get('login/{name}/callback', [\App\Http\Controllers\UserController::class, 'handleProviderCallback']);
