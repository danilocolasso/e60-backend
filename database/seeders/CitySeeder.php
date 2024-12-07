<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('cidade')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_cidade,
                'city' => $row->cidade,
                'state' => $row->uf,
                'zip_code' => $row->cep8,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('cities')->insert($data);
    }
}
