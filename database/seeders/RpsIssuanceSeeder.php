<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsIssuanceSeeder extends Seeder
{
    private const STATUS = [
        'GERADO' => 'generated',
        'ENVIADO' => 'sent',
    ];

    public function run(): void
    {

        $batchSize = 2000;
        $offset = 0;

        while (true) {
            $rows = DB::connection('mysql')
                ->table('rps')
                ->selectRaw("
                    id_rps AS id,
                    id_filial AS branch_id,
                    CASE
                        WHEN STR_TO_DATE(data_horario_inicio, '%Y-%m-%d %H:%i:%s') IS NOT NULL THEN data_horario_inicio
                        ELSE NULL
                    END AS start_datetime,
                    registros AS records,
                    valor_total AS total_value,
                    status,
                    numero_primeiro_rps AS first_rps_number,
                    CASE
                        WHEN STR_TO_DATE(data_cadastro, '%Y-%m-%d %H:%i:%s') IS NOT NULL THEN data_cadastro
                        ELSE NULL
                    END AS created_at
                ")
                ->limit($batchSize)
                ->offset($offset)
                ->get();

            if ($rows->isEmpty()) {
                break;
            }

            $data = [];
            foreach ($rows as &$row) {
                $rowArray = (array) $row;
                $rowArray['status'] = self::STATUS[$row->status];
                $data[] =  $rowArray;
            }

            if ($data) {
                DB::connection('pgsql')->table('rps_issuances')->insert($data);
            }

            $offset += $batchSize;
        }
    }
}
