<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $batchSize = 500;
        $offset = 0;
        $hasMoreRows = true;

        while ($hasMoreRows) {
            $rows = DB::connection('mysql')->table('cupom')
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
                    'id' => $row->id_cupom,
                    'code' => $row->cupom,
                    'discount' => $row->desconto,
                    'fixed_amount_per_person' => $row->valor_fixo_por_pessoa,
                    'branch_id' => $row->id_filial,
                    'room_id' => $row->id_sala,
                    'booking_id' => $row->id_reserva,
                    'expiration_date' => $row->data_validade === '0000-00-00' ? null : $row->data_validade,
                    'start_time' => $row->horario_inicio,
                    'end_time' =>
                        (!empty($row->horario_fim) && $row->horario_fim === '24:00') ?
                         '23:59'
                          :
                        (preg_match('/^\d{2}:\d{2}$/', $row->horario_fim) ? $row->horario_fim : null),
                    'reservation_start_date' => $row->data_reserva_inicio === '0000-00-00' ? null : $row->data_reserva_inicio,
                    'reservation_end_date' => $row->data_reserva_fim === '0000-00-00' ? null : $row->data_reserva_fim,
                    'partner' => $row->parceiro,
                    'days_of_week' => json_encode([
                        0 => $row->dia_domingo == 'S',
                        1 => $row->dia_segunda == 'S',
                        2 => $row->dia_terca == 'S',
                        3 => $row->dia_quarta == 'S',
                        4 => $row->dia_quinta == 'S',
                        5 => $row->dia_sexta == 'S',
                        6 => $row->dia_sabado == 'S',
                    ]),
                    'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
                    'created_at' => now(),
                ];

                unset($row);
            }


            if ($data) {
                DB::connection('pgsql')->table('coupons')->insert($data);
            }

            $offset += $batchSize;
            unset($data);
            gc_collect_cycles();
        }
    }
}
