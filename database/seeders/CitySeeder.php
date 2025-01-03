<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('cidade')->get()->map(fn($row) => [
            'id' => $row->id_cidade,
            'city' => $row->cidade,
            'state' => $row->uf,
            'zip_code' => $row->cep8,
        ])->toArray();

        DB::connection('pgsql')->table('cities')->insert($data);
    }
}
