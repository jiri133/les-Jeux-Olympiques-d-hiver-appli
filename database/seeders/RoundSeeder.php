<?php

namespace Database\Seeders;

use App\Models\Round;
use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    public function run(): void
    {
        $rounds = [
            ['sport_id' => 1, 'venue_id' => 2, 'name' => 'qualifications', 'date' => '2026-02-10', 'start_time' => '10:00', 'end_time' => '12:00', 'price' => 50],
            ['sport_id' => 1, 'venue_id' => 2, 'name' => 'semifinal',      'date' => '2026-02-11', 'start_time' => '10:00', 'end_time' => '12:00', 'price' => 75],
            ['sport_id' => 1, 'venue_id' => 2, 'name' => 'final',          'date' => '2026-02-13', 'start_time' => '14:00', 'end_time' => '16:00', 'price' => 100],

            ['sport_id' => 2, 'venue_id' => 3, 'name' => 'qualifications', 'date' => '2026-02-11', 'start_time' => '09:00', 'end_time' => '11:00', 'price' => 40],
            ['sport_id' => 2, 'venue_id' => 3, 'name' => 'final',          'date' => '2026-02-14', 'start_time' => '18:00', 'end_time' => '20:00', 'price' => 90],

            ['sport_id' => 3, 'venue_id' => 1, 'name' => 'qualifications group A', 'date' => '2026-02-10', 'start_time' => '15:00', 'end_time' => '17:00', 'price' => 60],
            ['sport_id' => 3, 'venue_id' => 1, 'name' => 'qualifications group B', 'date' => '2026-02-11', 'start_time' => '15:00', 'end_time' => '17:00', 'price' => 60],
            ['sport_id' => 3, 'venue_id' => 1, 'name' => 'semifinal',              'date' => '2026-02-13', 'start_time' => '19:00', 'end_time' => '21:00', 'price' => 90],
            ['sport_id' => 3, 'venue_id' => 1, 'name' => 'final',                  'date' => '2026-02-15', 'start_time' => '19:00', 'end_time' => '21:00', 'price' => 120],

            ['sport_id' => 4, 'venue_id' => 5, 'name' => 'qualifications round 1', 'date' => '2026-02-11', 'start_time' => '11:00', 'end_time' => '13:00', 'price' => 35],
            ['sport_id' => 4, 'venue_id' => 5, 'name' => 'qualifications round 2', 'date' => '2026-02-12', 'start_time' => '11:00', 'end_time' => '13:00', 'price' => 45],
            ['sport_id' => 4, 'venue_id' => 5, 'name' => 'final',                  'date' => '2026-02-14', 'start_time' => '15:00', 'end_time' => '17:00', 'price' => 85],

            ['sport_id' => 5, 'venue_id' => 4, 'name' => 'qualifications', 'date' => '2026-02-12', 'start_time' => '10:00', 'end_time' => '12:00', 'price' => 55],
            ['sport_id' => 5, 'venue_id' => 4, 'name' => 'final',          'date' => '2026-02-15', 'start_time' => '13:00', 'end_time' => '15:00', 'price' => 95],
        ];

        foreach ($rounds as $round) {
            Round::create($round);
        }
    }
}