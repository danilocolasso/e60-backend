<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('sala')->limit(1)->get()->map(fn($row) => [
            'id' => $row->id_sala,
            'branch_id' => $row->id_filial,
            'name_br' => $row->sala,
            'name_en' => $row->sala_en,
            'name_es' => $row->sala_es,
            'description_br' => $row->descricao,
            'description_en' => $row->descricao_en,
            'description_es' => $row->descricao_es,
            'image' => $row->img,
            'image_cover' => $row->url_capa,
            'image_icon' => $row->url_icone,
            'participants_min' => $row->participante_min,
            'participants_max' => $row->participante_max,
            'duration_in_minutes' => $row->duracao_minutos,
            'start_date' => $row->data_validade_inicio === '0000-00-00' ? null : $row->data_validade_inicio,
            'end_date' => $row->data_validade_fim === '0000-00-00' ? null : $row->data_validade_fim,
            'multiple_participants' => $row->multi_participantes_sn,
            'link_room' => $row->link_sala,
            'is_active' => $row->ativo_sn == 'S',
            'is_delivery' => $row->ativo_sn == 'S',
            'deleted_at' => $row->excluido_sn == "S" ? now() : null,
        ])->toArray();

        DB::connection('pgsql')->table('rooms')->insert($data);
    }
}
