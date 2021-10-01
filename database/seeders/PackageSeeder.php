<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Package;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'id'=>1,
            'name'=>'Below 10KG',
            'base_price'=>'1000',
            'tax'=>'200',
            'net_amt'=>'1200'            
        ]);
        DB::table('packages')->insert([
            'id'=>2,
            'name'=>'Upto 20KG',
            'base_price'=>'1500',
            'tax'=>'300',
            'net_amt'=>'1800'            
        ]);
        DB::table('packages')->insert([
            'id'=>3,
            'name'=>'Upto 30KG',
            'base_price'=>'2000',
            'tax'=>'400',
            'net_amt'=>'2400'            
        ]);
        DB::table('packages')->insert([
            'id'=>4,
            'name'=>'Upto 40KG',
            'base_price'=>'2500',
            'tax'=>'400',
            'net_amt'=>'2900'            
        ]);
    }
}
