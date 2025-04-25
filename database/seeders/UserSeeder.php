<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'username' => 'admin',
        'password' => Hash::make('123456'),
        'role' => 'admin'

      ]);
      DB::table('users')->insert([
        'name' => 'Vendor',
        'email' => 'vendor@gmail.com',
        'username' => 'vendor',
        'password' => Hash::make('123456'),
        'role' => 'vendor'

      ]);
      DB::table('users')->insert([
        'name' => 'User',
        'email' => 'user@gmail.com',
        'username' => 'user',
        'password' => Hash::make('123456'),
        'role' => 'user'

      ]);
      DB::table('users')->insert([
        'name' => 'User1',
        'email' => 'user1@gmail.com',
        'username' => 'user1',
        'password' => Hash::make('123456'),
        'role' => 'user'

      ]);
    }
}
