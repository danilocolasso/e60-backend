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
        $oldTable = DB::table('cliente_foto')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_cliente_foto,
                'legend' => $row->legenda,
                'url' => $row->url_foto,
                'share' => $row->compartilhar_sn == 'S' ? true : false,
                'customer_id' => $row->id_cliente,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('customer_photos')->insert($data);
    }
}
