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
        $oldTable = DB::table('comentario')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_comentario,
                'comment' => $row->comentario,
                'customers_id' => $row->id_cliente,
                'parent_comments_id' => $row->id_comentario_pai,
                'approved_by_user_id' => $row->id_usuario_aprovacao,
                'rooms_id' => $row->id_sala,
                'approved_at' => $row->data_aprovacao,
                'created_at' => $row->data_cadastro,
            ];
        })->toArray();

        DB::table('comments')->insert($data);
    }
}
