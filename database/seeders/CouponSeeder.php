<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $batchSize = 2000;
        $offset = 0;

        while (true) {
            $rows = DB::connection('mysql')
                ->table('cupom')
                ->selectRaw("
                    id_cupom AS id,
                    cupom AS code,
                    desconto AS discount,
                    valor_fixo_por_pessoa AS fixed_amount_per_person,
                    id_filial AS branch_id,
                    id_sala AS room_id,
                    id_reserva AS booking_id,
                    CASE WHEN STR_TO_DATE(data_validade, '%Y-%m-%d') IS NOT NULL THEN data_validade ELSE NULL END AS expiration_date,
                    horario_inicio AS start_time,
                    CASE
                        WHEN horario_fim = '24:00' THEN '23:59'
                        WHEN REGEXP_LIKE(horario_fim, '^[0-9]{2}:[0-9]{2}$') THEN horario_fim
                        ELSE NULL
                    END AS end_time,
                    CASE WHEN STR_TO_DATE(data_reserva_inicio, '%Y-%m-%d') IS NOT NULL THEN data_reserva_inicio ELSE NULL END AS reservation_start_date,
                    CASE WHEN STR_TO_DATE(data_reserva_fim, '%Y-%m-%d') IS NOT NULL THEN data_reserva_fim ELSE NULL END AS reservation_end_date,
                    parceiro AS partner,
                    JSON_OBJECT(
                        '0', dia_domingo = 'S',
                        '1', dia_segunda = 'S',
                        '2', dia_terca = 'S',
                        '3', dia_quarta = 'S',
                        '4', dia_quinta = 'S',
                        '5', dia_sexta = 'S',
                        '6', dia_sabado = 'S'
                    ) AS days_of_week,
                    CASE
                        WHEN excluido_sn = 'S' THEN NOW()
                        ELSE NULL
                    END AS deleted_at,
                    NOW() AS created_at
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
                unset($rowArray['booking_id']);
                $rowArray['branch_id'] =  $rowArray['branch_id'] == 0 ? null : $rowArray['branch_id'];
                $rowArray['room_id'] =  $rowArray['room_id'] == 0 ? null : $rowArray['room_id'];
                $data[] =  $rowArray;
            }

            if ($data) {
                DB::connection('pgsql')->table('coupons')->insert($data);
            }

            $offset += $batchSize;
        }
    }
}
