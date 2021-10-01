<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Branch;
class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::factory()->count(5)->create();
      
    }
}
