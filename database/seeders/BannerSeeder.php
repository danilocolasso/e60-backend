<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('banner')->get()->map(fn($row) => [
            'id' => $row->id_banner,
            'title' => $row->titulo,
            'link' => $row->link,
            'image' => $row->img,
            'is_active' => $row->ativo_sn == "S",
            'deleted_at' => $row->excluido_sn == "S" ? now() : null,
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('banners')->insert($data);
    }
}
