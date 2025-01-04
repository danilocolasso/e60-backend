<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('conquistas')->get()->map(fn($row) => [
            'id' => (int)$row->id_conquistas,
            'name' => $row->conquista,
            'description' => $row->descricao,
            'logo' => $row->logo,
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('achievements')->insert($data);
    }
}
