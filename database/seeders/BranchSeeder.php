<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::factory()->count(5)->create();

        Branch::inRandomOrder()->take(3)->get()->each(function (Branch $branch): void {
            $branch->rps_id = Branch::where('id', '!=', $branch->id)->inRandomOrder()->first()->id;
            $branch->save();
        });
    }
}
