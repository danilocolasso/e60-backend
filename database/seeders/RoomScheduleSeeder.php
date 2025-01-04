<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $batchSize = 1000;
        $offset = 0;

        while (true) {
            $rows = DB::connection('mysql')
                ->table('sala_horario')
                ->selectRaw("
                    id_sala_horario AS id,
                    id_filial AS branch_id,
                    id_sala AS room_id,
                    id_reserva AS booking_id,
                    id_usuario_bloqueio AS user_id,
                    DATE(horario_inicio) AS date,
                    TIME(horario_inicio) AS start_time,
                    TIME(horario_termino) AS end_time,
                    token,
                    valor AS price,
                    CASE
                        WHEN bloqueada_sn = 'S' THEN NOW()
                        ELSE NULL
                    END AS blocked_schedule,
                    motivo AS blocking_history,
                    CASE
                        WHEN excluido_sn = 'S' THEN NOW()
                        ELSE NULL
                    END AS deleted_at
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
                unset($rowArray['booking_id']); // TODO removed the create table booking
                $rowArray['user_id'] =  $rowArray['user_id'] == 0 ? null : $rowArray['user_id'];
                $rowArray['branch_id'] =  $rowArray['branch_id'] == 0 ? null : $rowArray['branch_id'];
                $data[] =  $rowArray;
            }

            if ($data) {
                DB::connection('pgsql')->table('room_schedules')->insert($data);
            }

            $offset += $batchSize;
        }
    }
}
