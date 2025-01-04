<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionarySeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('dicionario')->get()->map(fn($row) => [
            'id' => $row->id_dicionario,
            'index' => $row->indice,
            'text_pt' => $row->texto_br,
            'text_en' => $row->texto_en,
            'text_es' => $row->texto_es,
            'branch_id' => $row->id_filial == 0 ? null : $row->id_filial,
            'created_at' => now(),
        ])->toArray();

        DB::connection('pgsql')->table('dictionaries')->insert($data);
    }
}
