<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldBranches = DB::table('banner_filial')->get();

        $branchesData = $oldBranches->map(function ($oldBranch) {
            return [
                'id' => $oldBranch->id_banner_filial,
                'banners_id' => $oldBranch->id_banner,
                'branches_id' => $oldBranch->id_filial,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('branch_banners')->insert($branchesData);
    }
}
