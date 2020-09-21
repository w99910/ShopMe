<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('products')
           ->insert
             (['name'=>'Shirt 1',
               'price'=>20,
               'image_path'=>'product.Shirt 1.png',
               'quantity'=>10,
               'created_at'=>now()->toDateString(),
               'updated_at'=>now()->toDateString(),]);
       DB::table('products')
           ->insert
           (['name'=>'Shirt 2',
              'price'=>25,
              'image_path'=>'product.Shirt 2.png',
              'quantity'=>10,'created_at'=>now()->toDateString(),
               'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Shirt 3',
                'price'=>40,
                'image_path'=>'product.Shirt 3.png',
                'quantity'=>10,'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Shirt 4',
                'price'=>10,
                'image_path'=>'product.Shirt 4.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Product 5',
                'price'=>30,
                'image_path'=>'product.Product 5.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Long Coat 1',
                'price'=>20,
                'image_path'=>'product.Long Coat 1.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Long Coat 2',
                'price'=>20,
                'image_path'=>'product.Long Coat 2.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 1',
                'price'=>20,
                'image_path'=>'product.Pant 1.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 2',
                'price'=>20,
                'image_path'=>'product.Pant 2.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 3',
                'price'=>20,
                'image_path'=>'product.Pant 3.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 4',
                'price'=>20,
                'image_path'=>'product.Pant 4.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
    }
}
