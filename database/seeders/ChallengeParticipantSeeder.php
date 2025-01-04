<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeParticipantSeeder extends Seeder
{
    private const STATUS = [
        'ATIVO' => 'active',
        'GANHOU' => 'won',
        'PERDEU' => 'lost',
    ];

    public function run(): void
    {
        $data = DB::connection('mysql')->table('desafio_participante')->get()->map(fn($row) => [
            'id' => $row->id_desafio_participante,
            'challenge_event_id' => $row->id_desafio_evento,
            'name' => $row->nome,
            'email' => $row->email,
            'correct_answers' => $row->acertos,
            'incorrect_answers' => $row->erros,
            'status' => self::STATUS[$row->status],
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('challenge_participants')->insert($data);
    }
}
