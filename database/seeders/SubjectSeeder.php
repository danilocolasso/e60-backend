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
        $oldBranches = DB::table('assunto')->get();

        $branchesData = $oldBranches->map(function ($oldBranch) {
            return [
                'id' => $oldBranch->id_subject,
                'subject_br' => $oldBranch->subject_br,
                'subject_en' => $oldBranch->subject_en,
                'subject_es' => $oldBranch->subject_es,
                'email' => $oldBranch->email,
                'branches_id' => $oldBranch->id_filial,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('subjects')->insert($branchesData);
    }
}
