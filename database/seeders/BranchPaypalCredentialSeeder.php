<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchPaypalCredentialSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('filial')->get()->map(fn($row) => [
            'branch_id' => $row->id_filial,
            'user' => $row->paypal_user,
            'password' => $row->paypal_pwd,
            'signature' => $row->paypal_signature,
        ])->toArray();

        DB::connection('pgsql')->table('branch_paypal_credentials')->insert($data);
    }
}
