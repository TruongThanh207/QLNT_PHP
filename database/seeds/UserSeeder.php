<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
	        	[
	        		'name' => 'Truong Van Thanh',
	            	'username' => 'nt0802',
	            	'password' => bcrypt('love0510'),
                    'tel' => '0961791330',
                    'email' => 'vfrshjklg@gmail.com',
                    'img' => 'ava.jpg',
	            	'role'=> 1,
	            	'created_at' => new DateTime(),
	        	],
                [
                    'name' => 'Truong Van Thinh',
                    'username' => 'abc',
                    'password' => bcrypt('abc'),
                    'tel' => '0961791092',
                    'email' => 'abc@gmail.com',
                    'img' => 'avatargirl.jpg',
                    'role'=> 0,
                    'created_at' => new DateTime(),
                ],
                 [
                    'name' => 'Hoang Khanh Linh',
                    'username' => 'klinh',
                    'password' => bcrypt('klinh'),
                    'tel' => '0961791988',
                    'email' => 'klinh@gmail.com',
                    'img' => 'avatargirl.jpg',
                    'role'=> 0,
                    'created_at' => new DateTime(),
                ]
        	]);

        
    }
}
