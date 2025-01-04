<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchUserSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('usuario_filial')->get()->map(fn($row) => [
            'id' => $row->id_usuario_filial,
            'branch_id' => $row->id_filial,
            'user_id' => $row->id_usuario,
        ])->toArray();

        DB::connection('pgsql')->table('branch_users')->insert($data);
    }
}
