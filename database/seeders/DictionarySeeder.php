<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('dicionario')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_dicionario,
                'index' => $row->indice,
                'text_pt' => $row->texto_br,
                'text_en' => $row->texto_en,
                'text_es' => $row->texto_es,
                'branches_id' => $row->id_filial,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('dictionaries')->insert($data);
    }
}
