<?php

namespace Database\Seeders;

use App\Models\Rps;
use Illuminate\Database\Seeder;

class RpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rps::factory()->count(10)->create();
    }
}
