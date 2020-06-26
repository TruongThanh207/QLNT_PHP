<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rooms')->insert([
	        	[
	        		'code' => 'Room_1',
	        		'price' => 1500000,
	        		'status' => 0,
	            	'description' => 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người',
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'Room_2',
	        		'price' => 1500000,
	        		'status' => 0,
	            	'description' => 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người',
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'Room_3',
	        		'price' => 1500000,
	        		'status' => 0,
	            	'description' => 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người',
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'Room_4',
	        		'price' => 1500000,
	        		'status' => 0,
	            	'description' => 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người',
	            	'created_at' => new DateTime(),
	        	],
	        	[
	        		'code' => 'Room_5',
	        		'price' => 1500000,
	        		'status' => 0,
	            	'description' => 'Phòng 48m2, 1 gác nhỏ, phù hợp 2 với 3 người',
	            	'created_at' => new DateTime(),
	        	]
	        	
        	]);

        
    }
}
