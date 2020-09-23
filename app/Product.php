<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','price','image_path','purchased_by_user','quantity','size'];

    public function categories(){
           return $this->belongsToMany('App\Category','product_category');
       }
       public function discounts(){
        return $this->belongsToMany('App\Discount');
       }

}
