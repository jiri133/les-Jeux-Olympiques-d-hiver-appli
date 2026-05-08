<?php

namespace App\Http\Controllers;

use App\Models\Round;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $query = Round::with('sport', 'venue');

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        $rounds = $query->get();

        return view('tickets', [
            'rounds' => $rounds,
        ]);
    }
}