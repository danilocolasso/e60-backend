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
        $oldTable = DB::table('banner_filial')->get();

        $branchesData = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_banner_filial,
                'banners_id' => $row->id_banner,
                'branches_id' => $row->id_filial,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('branch_banners')->insert($branchesData);
    }
}
