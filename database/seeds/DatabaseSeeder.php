<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
//        $this->call(ProductSeeder::class);
        $categories=['Shirts','Outerwear','Pants','Shoes'];
        foreach($categories as $cate){
            \Illuminate\Support\Facades\DB::table('categories')->insert(['name'=>$cate,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        }

//        for($i=0;$i<20;$i++){
//            $product=\App\Product::all()->random();
//            $category=\App\Category::all()->random();
//                            \Illuminate\Support\Facades\DB::table('product_category')->insert([
//                                 'product_id'=>$product->id,
//                                'category_id'=>$category->id,
//                                'created_at'=>now()->toDateString(),
//                                'updated_at'=>now()->toDateString(),
//                            ])  ;
//    }
    }
}
