<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public function run(): void
    {
        //array 
        $sports = [
            'Alpine Skiing',
            'Figure Skating',
            'Ice Hockey',
            'Snowboard',
            'Bobsleigh',
        ];

        foreach ($sports as $name) {
            Sport::create(['name' => $name]);
        }
    }
}