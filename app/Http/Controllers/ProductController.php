<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Exports\UsersExport;
use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
   public function export(){
    return Excel::download(new ProductsExport(),'products.xlsx');
   }

    public function editing(Request $request,$id){
        $product=Product::find($id);

        if($request[0] != null && $request[1] !=null){
            $product->name=$request[0];
            $product->price= (float)$request[1];
            $product->save();
            return 'Product Successfully Edited';
        } elseif($request[0] == null) {
            $product->price= (float)$request[1];
            $product->save();
            return 'Product Price Successfully Edited';
        }
        else{

            $product->name=$request[0];
            $product->save();
            return 'Product Name Successfully Edited';
        }
    }
    public function purchase($id){
       $product=Product::find($id);
return view('purchase',compact('product'));
    }

}
