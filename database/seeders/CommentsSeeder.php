<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::table('comentario')->get()->map(fn($row) => [
            'id' => $row->id_comentario,
            'comment' => $row->comentario,
            'customer_id' => $row->id_cliente,
            'parent_comment_id' => $row->id_comentario_pai,
            'approved_by_user_id' => $row->id_usuario_aprovacao,
            'room_id' => $row->id_sala,
            'approved_at' => $row->data_aprovacao,
            'created_at' => $row->data_cadastro,
        ])->toArray();

        DB::table('comments')->insert($data);
    }
}
