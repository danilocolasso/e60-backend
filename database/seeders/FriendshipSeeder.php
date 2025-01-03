<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendshipSeeder extends Seeder
{
    private const STATUS = [
        'CONFIRMADO' => 'confirmed',
        'PENDENTE' => 'pending',
        'RECUSADO' => 'rejected',
    ];

    public function run(): void
    {
        $data = DB::connection('mysql')->table('amizade')->get()->map(fn($row) => [
            'id' => $row->id_amizade,
            'customer_id' => $row->id_cliente,
            'friendship_customer_id' => $row->id_cliente_amigo,
            'status' => self::STATUS[$row->status],
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('friendships')->insert($data);
    }
}
