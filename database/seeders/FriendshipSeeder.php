<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const STATUS = [
        'CONFIRMADO' => 'confirmed',
        'PENDENTE' => 'pending',
        'RECUSADO' => 'rejected',
    ];

    public function run(): void
    {
        $oldTable = DB::table('amizade')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_amizade,
                'customers_id' => $row->id_cliente,
                'friendship_customers_id' => $row->id_cliente_amigo,
                'status' => self::STATUS[$row->status],
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('friendships')->insert($data);
    }
}
