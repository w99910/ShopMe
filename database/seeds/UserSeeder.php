<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name'=>'zaw','email'=>'zaw@mail.com','password'=>bcrypt('12345678'), 'remember_token' => Str::random(10),]);
        DB::table('users')->insert(['name'=>'admin','email'=>'admin@mail.com','password'=>bcrypt('12345678'), 'remember_token' => Str::random(10),'role'=>'admin']);

    }
}
