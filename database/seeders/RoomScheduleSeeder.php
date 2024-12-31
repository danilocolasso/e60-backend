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
        $batchSize = 5000;
        $offset = 0;
        $hasMoreRows = true;

        while ($hasMoreRows) {
            $rows = DB::connection('mysql')->table('sala_horario')
                ->limit($batchSize)
                ->offset($offset)
                ->get();

            if ($rows->isEmpty()) {
                $hasMoreRows = false;
                continue;
            }

            $data = [];
            foreach ($rows as &$row) {
                $startDateTime = Carbon::parse($row->horario_inicio);
                $endDateTime = Carbon::parse($row->horario_termino);

                $data[] = [
                    'id' => $row->id_sala_horario,
                    'branch_id' => $row->id_filial,
                    'room_id' => $row->id_sala,
                    'booking_id' => $row->id_reserva,
                    'user_id' => $row->id_usuario_bloqueio,
                    'date' => $startDateTime->format('Y-m-d'),
                    'start_time' => $startDateTime->format('H:i:s'),
                    'end_time' => $endDateTime->format('H:i:s'),
                    'token' => $row->token,
                    'price' => $row->valor,
                    'blocked_schedule' => $row->bloqueada_sn === "S" ? now() : null,
                    'blocking_history' => $row->motivo,
                    'deleted_at' => $row->excluido_sn === "S" ? now() : null,
                ];

                unset($row);
            }

            if ($data) {
                DB::connection('pgsql')->table('room_schedules')->insert($data);
            }

            $offset += $batchSize;
            unset($data);
            gc_collect_cycles();

            $hasMoreRows = false;  // REMOVER DEPOIS DOS TESTES
        }
    }
}
