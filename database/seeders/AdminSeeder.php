<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Agatha Williams',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$zXgnp.9rIXbNYr3ZUo7xVOWUhKKHXJZ63nBgT1zLFgi0CG6RUgfxG',
                'remember_token' => NULL,
            ),
        ));
    }
}
