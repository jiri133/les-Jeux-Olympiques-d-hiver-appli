<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Round;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $roundId => $quantity) {
            $round = Round::with('sport', 'venue')->find($roundId);
            $items[] = ['round' => $round, 'quantity' => $quantity];
            $total = $total + $round->price * $quantity;
        }

        return view('checkout', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        $total = 0;
        foreach ($cart as $roundId => $quantity) {
            $round = Round::find($roundId);
            $total = $total + $round->price * $quantity;
        }

        $reservation = Reservation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'total' => $total,
        ]);

        $i = 0;
        foreach ($cart as $roundId => $quantity) {
            for ($j = 0; $j < $quantity; $j++) {
                $reservation->spectators()->create([
                    'round_id' => $roundId,
                    'first_name' => $request->spectator_first_name[$i],
                    'last_name' => $request->spectator_last_name[$i],
                    'phone' => $request->phone,
                    'email' => $request->email,
                ]);
                $i++;
            }
        }

        session()->forget('cart');

        return redirect('/reservations/' . $reservation->id . '/confirmation');
    }

    public function confirmation($id)
    {
        $reservation = Reservation::with('spectators.round.sport', 'spectators.round.venue')->find($id);

        return view('confirmation', [
            'reservation' => $reservation,
        ]);
    }
}