<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('desafio_evento')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_desafio_evento,
                'title' => $row->titulo,
                'start_date' => $row->data_inicio,
                'end_date' => $row->data_fim,
                'json_parameter' => $row->parametro_json,
                'is_active' => $row->status == 'INATIVO' ? false : true,
                'deleted_at' => $row->excluido_sn == "S" ? now() : null,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('challenge_events')->insert($data);
    }
}
