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
        $data = DB::table('banner_filial')->get()->map(fn($row) => [
            'id' => $row->id_banner_filial,
            'banners_id' => $row->id_banner,
            'branches_id' => $row->id_filial,
            'created_at' => now(),
        ])->toArray();

        DB::table('branch_banners')->insert($data);
    }
}
