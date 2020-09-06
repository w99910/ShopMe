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
        $this->call(CategorySeeder::class);
        $product=\App\Product::all()->random();
        $category=\App\Category::all()->random();
        // $this->call(UserSeeder::class);
        for($i=0;$i<20;$i++){
                            \Illuminate\Support\Facades\DB::table('product_category')->insert([
                                 'product_id'=>$product,
                                'category_id'=>$category,
                                'created_at'=>now()->toDateTimeString(),
                                'updated_at'=>now()->toDateTimeString(),
                            ])  ;
    }
    }
}
