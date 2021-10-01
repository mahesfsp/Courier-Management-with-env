<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=>1,
            'branch_id'=>1,
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'username'=>'adminuser',
            'password'=>bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'role_id'=>2,
            'branch_id'=>2,
            'name'=>'mahes',
            'email'=>'mahes@gmail.com',
            'username'=>'maheswari',
            'password'=>bcrypt('password'),
        ]);
            
    }
}
