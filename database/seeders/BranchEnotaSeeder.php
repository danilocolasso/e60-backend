<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchEnotaSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('filial')->get()->map(fn($row) => [
            'branch_id' => $row->id_filial,
            'enotas_api_key' => $row->enotas_apikey,
            'enotas_company_id' => $row->enotas_empresaid,
        ])->toArray();

        DB::connection('pgsql')->table('branch_enotas')->insert($data);
    }
}
