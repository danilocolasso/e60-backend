<?php

namespace Database\Seeders;

use App\Models\CustomerContact;
use Illuminate\Database\Seeder;

class CustomerContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerContact::factory()->count(40)->create();
    }
}
