<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('assunto')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'id' => $row->id_subject,
                'subject_br' => $row->subject_br,
                'subject_en' => $row->subject_en,
                'subject_es' => $row->subject_es,
                'email' => $row->email,
                'branches_id' => $row->id_filial,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('subjects')->insert($data);
    }
}
