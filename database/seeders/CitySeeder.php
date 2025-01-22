<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/cities.json');
        $data = File::get($path);
        $cities = json_decode($data, true);
        $cities = $this->addTimestamps($cities);

        $chunks = array_chunk($cities, 1000);

        foreach ($chunks as $chunk) {
            DB::table('cities')->insert($chunk);
        }
    }

    private function addTimestamps(array $cities): array
    {
        $timestamp = Carbon::now();

        foreach ($cities as $key => $city) {
            $cities[$key]['created_at'] = $timestamp;
            $cities[$key]['updated_at'] = $timestamp;
        }

        return $cities;
    }
}
