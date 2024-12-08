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

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('desafio_participante_enigma')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_desafio_participante_enigma,
                'challenge_participants_id' => $row->id_desafio_participante,
                'challenge_events_id' => $row->id_desafio_evento,
                'challenge_riddles_id' => $row->id_desafio_enigma,
                'attempts' => $row->tentativas,
                'answers' => $row->respostas,
                'status' => self::STATUS[$row->status],
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('challenge_participant_riddles')->insert($data);
    }
}
