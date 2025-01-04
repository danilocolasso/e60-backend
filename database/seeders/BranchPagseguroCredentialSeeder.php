<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchPagseguroCredentialSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('filial')->get()->map(fn($row) => [
            'branch_id' => $row->id_filial,
            'token' => $row->pagseguro_token,
            'email' => $row->pagseguro_email,
            'client_id' => $row->pagseguro_client_id,
            'client_secret' => $row->pagseguro_client_secret,
        ])->toArray();

        DB::connection('pgsql')->table('branch_pagseguro_credentials')->insert($data);
    }
}
