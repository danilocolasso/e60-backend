<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::table('cliente_foto')->get()->map(fn($row) => [
            'id' => $row->id_cliente_foto,
            'legend' => $row->legenda,
            'url' => $row->url_foto,
            'share' => $row->compartilhar_sn == 'S',
            'customer_id' => $row->id_cliente,
        ])->toArray();

        DB::table('customer_photos')->insert($data);
    }
}
