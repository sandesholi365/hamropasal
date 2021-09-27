<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                //Admin_Section

                'full_name'=>'Sandesh Oli',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin'),
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                //Vendor_Section
                
                'full_name'=>'Vendor',
                'username'=>'vendor',
                'email'=>'vendor@gmail.com',
                'password'=>bcrypt('vendor'),
                'role'=>'vendor',
                'status'=>'active'
            ], 
            [
                //Customer_Section
                
                'full_name'=>'Customer',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>bcrypt('customer'),
                'role'=>'customer',
                'status'=>'active'
            ]
            ]);
    }
}
