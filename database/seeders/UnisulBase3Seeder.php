<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UnisulBase3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::table('base_unisul_3')->get()->map(fn($row) => [
            'id' => $row->id,
            'name' => $row->nome,
            'email' => $row->email,
            'cpf' => preg_replace('/\D/', '',$row->cpf),
            'phone' => preg_replace('/\D/', '',$row->telefone),
            'city' => $row->cidade,
            'state' => $row->uf,
            'school' => $row->escola,
            'university' => $row->instituicao,
            'campus' => $row->campus,
            'degree' => $row->grau,
            'referral' => $row->referral,
            'password' => Hash::make($row->senha),
            'created_at' => $row->data,
        ])->toArray();

        DB::table('unisul_base3s')->insert($data);
    }
}
