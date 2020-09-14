<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
   public function export(){
    return Excel::download(new ProductsExport(),'products.xlsx');


   }
}
