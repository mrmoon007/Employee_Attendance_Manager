<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->delete();
        
        DB::table('schedules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'time_out' => date("H:i"),
                'time_in' => date("H:i"),
                'slug' => Str::slug('schedules'),
            ),
        ));
    }
}
