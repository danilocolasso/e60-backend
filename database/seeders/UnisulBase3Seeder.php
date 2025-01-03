<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UnisulBase3Seeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('base_unisul_3')->get()->map(fn($row) => [
            'id' => $row->id,
            'name' => $row->nome,
            'email' => $row->email,
            'cpf' => only_numbers($row->cpf),
            'phone' => only_numbers($row->telefone),
            'city' => $row->cidade,
            'state' => $row->uf,
            'school' => $row->escola,
            'university' => $row->instituicao,
            'campus' => $row->campus,
            'degree' => $row->grau,
            'referral' => $row->referral,
            'password' => Hash::make($row->senha),
            'created_at' => Carbon::parse($row->data)->isValid() ? Carbon::parse($row->data) : Carbon::now(),
        ])->toArray();

        DB::connection('pgsql')->table('unisul_base3s')->insert($data);
    }
}
