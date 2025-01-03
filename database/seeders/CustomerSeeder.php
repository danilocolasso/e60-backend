<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $batchSize = 500;
        $offset = 0;
        $hasMoreRows = true;

        while ($hasMoreRows) {
            $rows = DB::connection('mysql')
                ->table('cliente')
                ->selectRaw("
                    id_cliente AS id,
                    nome AS name,
                    REGEXP_REPLACE(documento, '[^0-9]', '') AS cpf,
                    CASE
                        WHEN STR_TO_DATE(data_nascimento, '%Y-%m-%d') IS NOT NULL
                        THEN data_nascimento
                        ELSE null
                    END AS birth_date,
                    logradouro AS street,
                    numero AS number,
                    complemento AS complement,
                    bairro AS district,
                    cidade AS city,
                    uf AS state,
                    cep AS zip_code,
                    email,
                    senha AS password,
                    REGEXP_REPLACE(celular, '[^0-9]', '') AS mobile_number,
                    REGEXP_REPLACE(telefone, '[^0-9]', '') AS phone_number,
                    news_sn = 'S' AS news_subscription,
                    corporativo_sn = 'S' AS is_corporate,
                    json_contato AS contact_json,
                    NULLIF(id_filial_faturamento, 0) AS branch_id,
                    rdstation_msg AS rdstation_message,
                    rdstation_timestamp,
                    rdstation_uuid,
                    codigo_convite AS invitation_code,
                    convite_utilizado AS invitation_used,
                    conquistas AS achievements,
                    usuario AS username,
                    url_imagem AS image_url,
                    CASE WHEN corporativo_sn = 'S' THEN NOW() ELSE NULL END AS deleted_at,
                    data_cadastro AS created_at
                ")
                ->limit($batchSize)
                ->offset($offset)
                ->get();

            if ($rows->isEmpty()) {
                $hasMoreRows = false;
                continue;
            }

            $data = [];
            foreach ($rows as &$row) {
                $rowArray = (array) $row;
                $rowArray['password'] = bcrypt($row->password);
                $data[] = $rowArray;
            }


            if ($data) {
                DB::connection('pgsql')->table('customers')->insert($data);
            }

            $offset += $batchSize;
        }
    }
}
