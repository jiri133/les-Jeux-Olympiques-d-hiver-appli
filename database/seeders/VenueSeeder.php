<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        $venues = [
            ['name' => 'Forum di Assago', 'capacity' => 12000],
            ['name' => 'Stelvio Slope', 'capacity' => 8000],
            ['name' => 'Milano Ice Arena', 'capacity' => 15000],
            ['name' => 'Cortina Ice Hall', 'capacity' => 6000],
            ['name' => 'Bormio Olympic Park', 'capacity' => 10000],
        ];

        foreach ($venues as $venue) {
            Venue::create($venue);
        }
    }
}