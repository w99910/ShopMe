<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','2fa']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        cache()->forget('Products');
//        $products=cache()->remember('Products',60*60,function(){
//           return Product::all();
//        });
        $products=Product::all();
        return view('home',compact('products'));
    }
}
