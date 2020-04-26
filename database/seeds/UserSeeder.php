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
        DB::table('Users')->insert(
	        	[
	        		'name' => 'Truong Van Thanh',
	            	'username' => 'nt0802',
	            	'password' => bcrypt('love0510'),
	            	'role'=> 1,
	            	'created_at' => new DateTime(),
	        	]
        	);
    }
}
