<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('admins')->insert([
    		'name'=>'Ersin Yıldız',
    		'email'=>'ersny@gmail.com',
    		'password'=>bcrypt(102030),
    	]);




    }
}
