<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('cupom')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_cupom,
                'code' => $row->cupom,
                'discount' => $row->desconto,
                'fixed_amount_per_person' => $row->valor_fixo_por_pessoa,
                'branches_id' => $row->id_filial,
                'rooms_id' => $row->id_sala,
                'bookings_id' => $row->id_reserva,
                'expiration_date' => $row->data_validade,
                'start_time' => $row->horario_inicio,
                'end_time' => $row->horario_fim,
                'reservation_start_date' => $row->data_reserva_inicio,
                'reservation_end_date' => $row->data_reserva_fim,
                'partner' => $row->parceiro,
                'sunday' => $row->dia_domingo == 'S' ? true : false,
                'monday' => $row->dia_segunda == 'S' ? true : false,
                'tuesday' => $row->dia_terca == 'S' ? true : false,
                'wednesday' => $row->dia_quarta == 'S' ? true : false,
                'thursday' => $row->dia_quinta == 'S' ? true : false,
                'friday' => $row->dia_sexta == 'S' ? true : false,
                'saturday' => $row->dia_sabado == 'S' ? true : false,
                'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('coupons')->insert($data);
    }
}
