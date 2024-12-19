<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const STATUS = [
        'ATIVO' => 'active',
        'GANHOU' => 'won',
        'PERDEU' => 'lost',
    ];

    public function run(): void
    {
        $oldTable = DB::table('desafio_participante')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_desafio_participante,
                'challenge_events_id' => $row->id_desafio_evento,
                'name' => $row->nome,
                'email' => $row->email,
                'correct_answers' => $row->acertos,
                'incorrect_answers' => $row->erros,
                'status' => self::STATUS[$row->status],
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('challenge_participants')->insert($data);
    }
}
