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
        $oldBranches = DB::table('amizade')->get();

        $branchesData = $oldBranches->map(function ($oldBranch) {
            return [
                'id' => $oldBranch->id_amizade,
                'customers_id' => $oldBranch->id_cliente,
                'friendship_customers_id' => $oldBranch->id_cliente_amigo,
                'status' => self::STATUS[$oldBranch->status],
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('friendships')->insert($branchesData);
    }
}
