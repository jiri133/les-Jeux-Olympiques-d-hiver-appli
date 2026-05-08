<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return 'TODO: Checkout page';
    }

    public function store(Request $request)
    {
        return 'TODO: Save reservation';
    }

    public function confirmation($id)
    {
        return 'TODO: Confirmation page for reservation #' . $id;
    }
}