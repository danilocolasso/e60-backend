<?php

namespace Database\Seeders;

use App\Models\BranchPaypalCredential;
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
            UserSeeder::class,
            BranchSeeder::class,
            AchievementsSeeder::class,
            BannerSeeder::class,
            // BookingSeeder::class,
            BranchBannerSeeder::class,
            BranchEnotaSeeder::class,
            BranchGiftcardSeeder::class,
            BranchPagseguroCredentialSeeder::class,
            BranchPaypalCredentialSeeder::class,
            BranchRpsConfigurationSeeder::class,
            ChallengeEventSeeder::class,
            ChallengeParticipantSeeder::class,
            ChallengeRiddlesSeeder::class,
            ChallengeParticipantRiddleSeeder::class,
            CitySeeder::class,
            RoomSeeder::class,
            CustomerSeeder::class,
            CustomerPhotoSeeder::class,
            CommentsSeeder::class,
            // CouponSeeder::class,
            DictionarySeeder::class,
            FriendshipSeeder::class,
            RoomScheduleSeeder::class,
            RpsIssuanceSeeder::class,
            SubjectSeeder::class,
            // UnisulBase2Seeder::class,
            // UnisulBase3Seeder::class,
            // UnisulBaseSeeder::class,
        ]);
    }
}
