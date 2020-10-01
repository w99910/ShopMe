<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use Billable;
    public const Login_as_user="/home";
    public const Login_as_admin="/admin_home";
    public $checkout;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function isAdmin(User $user){
      return $user->role=="admin";
//    dd($user->role,$user->role=="admin",(bool)$user->role=='admin');
    }
    public function password_security(){
        return $this->hasOne('App\PasswordSecurity');
    }
    public function carts(){
        return $this->hasMany('App\Cart');
    }
    public function getTotalChargeAttribute(){
        $carts=$this->carts;
        foreach ($carts as $cart){
            $this->checkout += $cart->total_price;
        }
        return $this->checkout;
    }
    public function messages(){
        return $this->hasMany('App\Message','from','id');
    }
}
