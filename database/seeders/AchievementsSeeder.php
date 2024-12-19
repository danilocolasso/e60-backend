<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('conquistas')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => (int)$row->id_conquistas,
                'name' => $row->conquista,
                'description' => $row->descricao,
                'logo' => $row->logo,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('achievements')->insert($data);
    }
}
