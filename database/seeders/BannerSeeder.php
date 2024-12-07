<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldBranches = DB::table('filial')->get();

        $branchesData = $oldBranches->map(function ($oldBranch) {
            return [
                'id' => $oldBranch->id_banner,
                'title' => $oldBranch->titulo,
                'link' => $oldBranch->link,
                'image' => $oldBranch->img,
                'is_active' => $oldBranch->ativo_sn == "S" ? true : false,
                'deleted_at' => $oldBranch->excluido_sn == "S" ? now() : null,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('banners')->insert($branchesData);
    }
}
