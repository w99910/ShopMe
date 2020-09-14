<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','price','image_path','purchased_by_user','available','quantity'];

    public function categories(){
           return $this->belongsToMany('App\Category','product_category');
       }

}
