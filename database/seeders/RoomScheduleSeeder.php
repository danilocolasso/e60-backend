<?php

namespace Database\Seeders;

use App\Models\RoomSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomSchedule::factory()->count(20)->create();
    }
}
