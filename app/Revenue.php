<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\User');
    }

}
