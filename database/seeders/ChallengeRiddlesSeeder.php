<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeRiddlesSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('desafio_enigma')->get()->map(fn($row) => [
            'id' => $row->id_desafio_enigma,
            'challenge_event_id' => $row->id_desafio_evento,
            'order' => $row->ordem,
            'title' => $row->titulo,
            'answer' => $row->resposta,
            'attempts' => $row->tentativas,
            'image_path' => $row->caminho_imagem,
            'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('challenge_riddles')->insert($data);
    }
}
