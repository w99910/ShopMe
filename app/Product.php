<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
       public function categories(){
           return $this->belongsToMany('App\Category');
       }
       protected $fillable=['name','price','image_path','purchased_by_user','available'];
}
