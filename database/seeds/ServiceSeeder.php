<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Service')->insert([
	        	[
	        		'code' => 'S1',
	        		'name' => 'Chỉ Số Điện',
	            	'quantity' => 1,
	            	'price' => 3000,
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'S2',
	        		'name' => 'Chỉ Số Nước',
	            	'quantity' => 1,
	            	'price' => 10000,
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'S3',
	        		'name' => 'Xe',
	            	'quantity' => 1,
	            	'price' => 50000,
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'S4',
	        		'name' => 'Internet',
	            	'quantity' => 1,
	            	'price' => 50000,
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'S5',
	        		'name' => 'Truyền Hình Cáp',
	            	'quantity' => 1,
	            	'price' => 100000,
	            	'created_at' => new DateTime(),
	        	],
        	]);

        
    }
}
