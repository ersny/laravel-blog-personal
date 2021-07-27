<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pages=['Hakkımda','Çalışmalarım','İletişim'];
        $count=0;
    	foreach ($pages as $page)
        {
            $count++;
    		DB::table('pages')->insert([
    			'title'=>$page,
    			'slug'=>str::slug($page),
                'image'=>'https://lh3.googleusercontent.com/proxy/fUdsut_0XUKZbe3kxkyLSgKLegxWiyftuo6myn-31WR18tp4uN8GKj7OU90aA20Q8ROoy2W2dFy_0spWDkC5rHwZB6V4bCzInmEZ6tv1n_VYzRQYToFZJwTlMXdP2A',
                
                'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown  printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'order'=>$count,
    			'created_at'=>now(),
    			'updated_at'=>now()

    		]);
    	}



    	



    }
}
