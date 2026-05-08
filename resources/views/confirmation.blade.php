@extends('layouts.app')

@section('title', 'Confirmation')

@section('content')
    <h1>Reservation Confirmed!</h1>
    <p>Thank you, {{ $reservation->first_name }}. Your reservation #{{ $reservation->id }} has been registered.</p>

    <h3>Buyer details</h3>
    <p>
        Name: {{ $reservation->first_name }} {{ $reservation->last_name }}<br>
        Email: {{ $reservation->email }}<br>
        Phone: {{ $reservation->phone }}
    </p>

    <h3>Tickets</h3>
    @foreach($reservation->spectators as $spectator)
        <p>
            <strong>{{ $spectator->first_name }} {{ $spectator->last_name }}</strong><br>
            {{ $spectator->round->sport->name }} - {{ $spectator->round->name }}<br>
            {{ $spectator->round->venue->name }} on {{ $spectator->round->date->format('d M Y') }}
            at {{ $spectator->round->start_time }}<br>
            Price: {{ $spectator->round->price }} €
        </p>
    @endforeach

    <h3>Total: {{ $reservation->total }} €</h3>

    <a href="/" class="btn btn-primary">Back to home</a>
@endsection