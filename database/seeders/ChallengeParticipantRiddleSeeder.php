<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeParticipantRiddleSeeder extends Seeder
{
    private const STATUS = [
        'PENDENTE' => 'pending',
        'ACERTOU' => 'right',
        'ERROU' => 'wrong',
    ];

    public function run(): void
    {
        $data = DB::connection('mysql')->table('desafio_participante_enigma')->get()->map(fn($row) => [
            'id' => $row->id_desafio_participante_enigma,
            'challenge_participants_id' => $row->id_desafio_participante,
            'challenge_event_id' => $row->id_desafio_evento,
            'challenge_riddle_id' => $row->id_desafio_enigma,
            'attempts' => $row->tentativas,
            'answers' => $row->respostas,
            'status' => self::STATUS[$row->status],
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('challenge_participant_riddles')->insert($data);
    }
}
