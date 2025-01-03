<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchBannerSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('banner_filial')->get()->map(fn($row) => [
            'id' => $row->id_banner_filial,
            'banner_id' => $row->id_banner,
            'branch_id' => $row->id_filial,
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('branch_banners')->insert($data);
    }
}
