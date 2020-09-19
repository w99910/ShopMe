<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('discounts')->insert(['name'=>'5%','percent'=>5]);
        DB::table('discounts')->insert(['name'=>'10%','percent'=>10]);
        DB::table('discounts')->insert(['name'=>'15%','percent'=>15]);
        DB::table('discounts')->insert(['name'=>'20%','percent'=>20]);
        DB::table('discounts')->insert(['name'=>'25%','percent'=>25]);
        DB::table('discounts')->insert(['name'=>'50%','percent'=>50]);

    }
}
