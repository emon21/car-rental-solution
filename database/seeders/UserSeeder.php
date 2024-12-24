<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       DB::table('users')->insert([
       
        [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'role' => 'admin',
                // 'password' => hash('bcrypt', 'password'),
                'password' => Hash::make('1234'),
                
        ],
            [
                'name' => 'Customer',
                'email' => 'customer@mail.com',
                'role' => 'admin',
                // 'password' => hash('bcrypt', 'password'),
                'password' => Hash::make('1234'),

            ]

        
       ]);
    }
}
