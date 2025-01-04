<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchGiftcardSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('filial')->get()->map(fn($row) => [
            'branch_id' => $row->id_filial,
            'giftcard_person_limit' => $row->limite_pessoa_giftcard,
            'giftcard_value_per_person' => $row->valor_por_pessoa_giftcard,
        ])->toArray();

        DB::connection('pgsql')->table('branch_giftcards')->insert($data);
    }
}
