<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Round;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        return view('organizer.dashboard');
    }

    public function reservations()
    {
        $reservations = Reservation::with('spectators.round.sport', 'spectators.round.venue')->get();
        return view('organizer.reservations', ['reservations' => $reservations]);
    }

    public function stats()
    {
        $rounds = Round::with('sport', 'venue')->withCount('spectators')->get();
        return view('organizer.stats', ['rounds' => $rounds]);
    }
}