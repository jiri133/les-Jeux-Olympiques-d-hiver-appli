<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Sport;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $query = Round::with('sport', 'venue')->orderBy('date')->orderBy('start_time');

        if ($request->filled('sport_id')) {
            $query->where('sport_id', $request->sport_id);
        }

        $rounds = $query->get();

        $roundsByDay = $rounds->groupBy(function ($round) {
            return $round->date->format('Y-m-d');
        });

        $sports = Sport::orderBy('name')->get();

        return view('calendar', [
            'roundsByDay' => $roundsByDay,
            'sports' => $sports,
            'selectedSport' => $request->sport_id,
        ]);
    }
}