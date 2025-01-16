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
            BranchSeeder::class,
            AchievementSeeder::class,
            CustomerSeeder::class,
            CustomerContactSeeder::class,
            RoomSeeder::class,
            RoomScheduleSeeder::class,
            ProposalSeeder::class,
            RpsSeeder::class,
            BookingSeeder::class,
            CouponSeeder::class,
            UserSeeder::class,
        ]);
    }
}
