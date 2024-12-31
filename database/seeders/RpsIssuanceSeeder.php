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

        $batchSize = 200;
        $offset = 0;
        $hasMoreRows = true;

        while ($hasMoreRows) {
            $rows = DB::connection('mysql')->table('rps')
                ->limit($batchSize)
                ->offset($offset)
                ->get();

            if ($rows->isEmpty()) {
                $hasMoreRows = false;
                continue;
            }

            $data = [];
            foreach ($rows as &$row) {
                $data[] = [
                    'id' => $row->id_rps,
                    'branch_id' => $row->id_filial,
                    'start_datetime' => $row->data_horario_inicio === '0000-00-00 00:00:00' ? null : $row->data_horario_inicio,
                    'records' => $row->registros,
                    'total_value' => $row->valor_total,
                    'status' => self::STATUS[$row->status],
                    'first_rps_number' => $row->numero_primeiro_rps,
                    'created_at' => $row->data_cadastro === '0000-00-00 00:00:00' ? null : $row->data_cadastro,
                ];

                unset($row);
            }


            if ($data) {
                DB::connection('pgsql')->table('rps_issuances')->insert($data);
            }

            $offset += $batchSize;
            unset($data);
            gc_collect_cycles();
        }
    }
}
