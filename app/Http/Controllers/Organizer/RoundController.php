<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Round;
use App\Models\Sport;
use App\Models\Venue;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function index()
    {
        $rounds = Round::with('sport', 'venue')->orderBy('date')->get();
        return view('organizer.rounds.index', ['rounds' => $rounds]);
    }

    public function create()
    {
        $sports = Sport::all();
        $venues = Venue::all();
        return view('organizer.rounds.create', ['sports' => $sports, 'venues' => $venues]);
    }

    public function store(Request $request)
    {
        Round::create([
            'sport_id' => $request->sport_id,
            'venue_id' => $request->venue_id,
            'name' => $request->name,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'price' => $request->price,
        ]);

        return redirect()->route('organizer.rounds.index');
    }

    public function edit($id)
    {
        $round = Round::find($id);
        $sports = Sport::all();
        $venues = Venue::all();
        return view('organizer.rounds.edit', [
            'round' => $round,
            'sports' => $sports,
            'venues' => $venues,
        ]);
    }

    public function update(Request $request, $id)
    {
        $round = Round::find($id);
        $round->update([
            'sport_id' => $request->sport_id,
            'venue_id' => $request->venue_id,
            'name' => $request->name,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'price' => $request->price,
        ]);

        return redirect()->route('organizer.rounds.index');
    }

    public function destroy($id)
    {
        $round = Round::find($id);
        $round->delete();

        return redirect()->route('organizer.rounds.index');
    }
}