<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DB::table('cliente')->get()->map(fn($row) => [
            'id' => $row->id,
            'name' => $row->nome(),
            'cpf' => preg_replace('/\D/', '', $row->cpf),
            'birth_date' => $row->data_nascimento,
            'street' => $row->logradouro,
            'number' => $row->numero,
            'complement' => $row->complemento,
            'district' => $row->bairro,
            'city' => $row->cidade,
            'state' => $row->uf,
            'zip_code' => $row->cep,
            'email' => $row->email,
            'password' => Hash::make($row->senha),
            'mobile_number' => preg_replace('/\D/', '',$row->celular),
            'phone_number' => preg_replace('/\D/', '',$row->telefone),
            'news_subscription' => $row->news_sn == 'S',
            'is_corporate' => $row->corporativo_sn == 'S',
            'contact_json' => $row->json_contato,
            'branches_id' => $row->id_filial_faturamento,
            'rdstation_message' => $row->rdstation_msg,
            'rdstation_timestamp' => $row->rdstation_timestamp,
            'rdstation_uuid' => $row->rdstation_uuid,
            'invitation_code' => $row->codigo_convite,
            'invitation_used' => $row->convite_utilizado,
            'achievements' => $row->conquistas,
            'username' => $row->usuario,
            'image_url' => $row->url_imagem,
            'deleted_at' => $row->corporativo_sn == 'S' ? now() : null,
            'created_at' => $row->data_cadastro,
        ])->toArray();

        DB::table('customers')->insert($data);
    }
}
