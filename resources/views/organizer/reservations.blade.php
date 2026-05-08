@extends('layouts.app')

@section('title', 'Reservations')

@section('content')
    <h1 class="mb-4">All Reservations</h1>

    <a href="{{ route('organizer.dashboard') }}" class="btn btn-secondary mb-3">← Back to Dashboard</a>

    @if($reservations->count() === 0)
        <p>No reservations yet.</p>
    @else
        @foreach($reservations as $reservation)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>Reservation #{{ $reservation->id }}</h5>
                    <p>
                        <strong>Buyer:</strong> {{ $reservation->first_name }} {{ $reservation->last_name }}<br>
                        <strong>Email:</strong> {{ $reservation->email }}<br>
                        <strong>Phone:</strong> {{ $reservation->phone }}<br>
                        <strong>Total:</strong> {{ $reservation->total }} €<br>
                        <strong>Date:</strong> {{ $reservation->created_at->format('d M Y H:i') }}
                    </p>

                    <strong>Spectators ({{ $reservation->spectators->count() }}):</strong>
                    <ul>
                        @foreach($reservation->spectators as $spectator)
                            <li>
                                {{ $spectator->first_name }} {{ $spectator->last_name }}
                                — {{ $spectator->round->sport->name }} ({{ $spectator->round->name }}),
                                {{ $spectator->round->venue->name }},
                                {{ $spectator->round->date->format('d M Y') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
@endsection