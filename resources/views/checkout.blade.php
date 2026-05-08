@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <h1>Checkout</h1>

    <form method="POST" action="/reservations">
        @csrf

        <h3>Your details</h3>
        <p>
            <label>First name</label>
            <input type="text" name="first_name" required>
        </p>
        <p>
            <label>Last name</label>
            <input type="text" name="last_name" required>
        </p>
        <p>
            <label>Email</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Phone</label>
            <input type="text" name="phone" required>
        </p>

        <h3>Spectator names</h3>

        @foreach($items as $item)
            @for($j = 0; $j < $item['quantity']; $j++)
                <p>
                    <strong>{{ $item['round']->sport->name }} - {{ $item['round']->name }}</strong>
                    <br>
                    <input type="text" name="spectator_first_name[]" placeholder="First name" required>
                    <input type="text" name="spectator_last_name[]" placeholder="Last name" required>
                </p>
            @endfor
        @endforeach

        <h3>Total: {{ $total }} €</h3>
        <button type="submit">Confirm Reservation</button>
    </form>
@endsection