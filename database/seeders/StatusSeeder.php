<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'id'=>'1', 
            'name'=>'Ordered',
            'desc'=>'Preparing for courier dispatch'     
        ]);

        DB::table('statuses')->insert([
            'id'=>'2', 
            'name'=>'Shipped',
            'desc'=>'Courier shipped by our branch staff'            
        ]);
        DB::table('statuses')->insert([
            'id'=>'3', 
            'name'=>'Out for delivery',
            'desc'=>'Courier will be deliver by our courier agent'            
        ]);
        DB::table('statuses')->insert([
            'id'=>'4', 
            'name'=>'Delivered',
            'desc'=>'Courier delivered to receipent address'            
        ]);
    }
}
