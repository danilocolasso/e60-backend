<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('comentario')->get()->map(fn($row) => [
            'id' => $row->id_comentario,
            'comment' => $row->comentario,
            'customer_id' => $row->id_cliente == 0 ? null : $row->id_cliente,
            'parent_comment_id' => $row->id_comentario_pai,
            'approved_by_user_id' => $row->id_usuario_aprovacao == 0 ? null : $row->id_usuario_aprovacao,
            'room_id' => $row->id_sala,
            'approved_at' => $row->data_aprovacao,
            'created_at' => $row->data_cadastro,
        ])->toArray();

        DB::connection('pgsql')->table('comments')->insert($data);
    }
}
