<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            DiscountSeeder::class]);
        $categories=['Shirts','Outerwear','Pants','Shoes'];
        foreach($categories as $cate){
            \Illuminate\Support\Facades\DB::table('categories')->insert(['name'=>$cate,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        }
//        $product1=\App\Product::find(1);
//        $product2=\App\Product::find(2);
//        $product3=\App\Product::find(3);
//        $product4=\App\Product::find(4);
//        $product5=\App\Product::find(5);
//        $product6=\App\Product::find(6);
//        $product7=\App\Product::find(7);
//        $product8=\App\Product::find(8);
//        $product9=\App\Product::find(9);
//        $product10=\App\Product::find(10);
//        $product11=\App\Product::find(11);
//        $product1->categories()->attach(1);
//        $product2->categories()->attach(1);
//        $product3->categories()->attach(1);
//        $product4->categories()->attach(1);
//        $product5->categories()->attach(1);
//        $product6->categories()->attach(2);
//        $product7->categories()->attach(2);
//        $product8->categories()->attach(3);
//        $product9->categories()->attach(3);
//        $product10->categories()->attach(3);
//        $product11->categories()->attach(3);
//        $product1->discounts()->attach(1);
//        $product3->discounts()->attach(3);
//        $product5->discounts()->attach(2);
//        $product8->discounts()->attach(6);
//        $product11->discounts()->attach(5);


        //        php artisan migrate:fresh --seed

    }
}
