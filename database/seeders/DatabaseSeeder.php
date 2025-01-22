<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            BranchSeeder::class,
            AchievementSeeder::class,
            CustomerSeeder::class,
            CustomerContactSeeder::class,
            RoomSeeder::class,
            UserSeeder::class,
            ProposalSeeder::class,
            RpsSeeder::class,
            BookingSeeder::class,
            RoomScheduleSeeder::class,
            CouponSeeder::class,
        ]);
    }
}
