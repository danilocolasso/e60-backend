<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('assunto')->get()->map(fn($row) => [
            'id' => $row->id_assunto,
            'subject_br' => $row->assunto_br,
            'subject_en' => $row->assunto_en,
            'subject_es' => $row->assunto_es,
            'email' => $row->email,
            'branch_id' => $row->id_filial,
        ])->toArray();

        DB::connection('pgsql')->table('subjects')->insert($data);
    }
}
