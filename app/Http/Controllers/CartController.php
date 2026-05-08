<?php

namespace App\Http\Controllers;

use App\Models\Round;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);
        $rounds = [];
        $total = 0;

        foreach ($cart as $roundId => $quantity) {
            $round = Round::with('sport', 'venue')->find($roundId);
            if ($round) {
                $rounds[] = [
                    'round' => $round,
                    'quantity' => $quantity,
                    'subtotal' => $round->price * $quantity,
                ];
                $total += $round->price * $quantity;
            }
        }

        return view('cart', [
            'rounds' => $rounds,
            'total' => $total,
        ]);
    }

    public function add(Request $request)
    {
        $cart = session('cart', []);
        $roundId = $request->round_id;

        if (isset($cart[$roundId])) {
            $cart[$roundId]++;
        } else {
            $cart[$roundId] = 1;
        }

        session(['cart' => $cart]);

        return redirect('/cart');
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        $roundId = $request->round_id;

        unset($cart[$roundId]);

        session(['cart' => $cart]);

        return redirect('/cart');
    }
}