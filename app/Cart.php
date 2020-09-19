<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function getTotalPriceAttribute(){
        return $this->quantity*$this->price;
    }

}
