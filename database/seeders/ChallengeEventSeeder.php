<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeEventSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('desafio_evento')->get()->map(fn($row) => [
            'id' => $row->id_desafio_evento,
            'title' => $row->titulo,
            'start_date' => $row->data_inicio,
            'end_date' => $row->data_fim,
            'json_parameter' => $row->parametro_json,
            'is_active' => $row->status == 'INATIVO' ? false : true,
            'deleted_at' => $row->excluido_sn == "S" ? now() : null,
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('challenge_events')->insert($data);
    }
}
