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
               'size'=>'sm|md|lg|xl',
               'image_path'=>'product.Shirt 1.png',
               'quantity'=>10,
               'created_at'=>now()->toDateString(),
               'updated_at'=>now()->toDateString(),]);
       DB::table('products')
           ->insert
           (['name'=>'Shirt 2',
              'price'=>25,
              'size'=>'sm|md|lg|xl',
              'image_path'=>'product.Shirt 2.png',
              'quantity'=>10,'created_at'=>now()->toDateString(),
               'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Shirt 3',
                'price'=>40,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Shirt 3.png',
                'quantity'=>10,'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Shirt 4',
                'price'=>10,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Shirt 4.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Product 5',
                'price'=>30,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Product 5.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Long Coat 1',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Long Coat 1.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Long Coat 2',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Long Coat 2.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 1',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Pant 1.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 2',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Pant 2.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 3',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Pant 3.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Pant 4',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Pant 4.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Trucker Jacket',
                'price'=>40,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Trucker Jacket.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Jacket Greynish',
                'price'=>20,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Jacket Greynish.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Hoodie 20',
                'price'=>30,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Hoodie 20.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Hoodie Color',
                'price'=>58,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Hoodie Color.png',
                'quantity'=>10,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);
        DB::table('products')
            ->insert
            (['name'=>'Jacket Yolo 12',
                'price'=>40,
                'size'=>'sm|md|lg|xl',
                'image_path'=>'product.Jacket Yolo 12.png',
                'quantity'=>15,
                'created_at'=>now()->toDateString(),
                'updated_at'=>now()->toDateString(),]);

    }
}
