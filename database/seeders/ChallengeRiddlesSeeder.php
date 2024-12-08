<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeRiddlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('desafio_enigma')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_desafio_enigma,
                'challenge_events_id' => $row->id_desafio_evento,
                'order' => $row->ordem,
                'title' => $row->titulo,
                'answer' => $row->resposta,
                'attempts' => $row->tentativas,
                'image_path' => $row->caminho_imagem,
                'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('challenge_riddles')->insert($data);
    }
}
