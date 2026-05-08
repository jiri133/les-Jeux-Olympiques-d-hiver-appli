@extends('layouts.app')

@section('title', 'Organizer Dashboard')

@section('content')
    <h1 class="mb-4">Organizer Dashboard</h1>
    <p class="text-muted">Welcome, {{ auth()->user()->name }}!</p>

    <div class="row g-3 mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Competitions</h5>
                    <p>Manage rounds (create, edit, delete)</p>
                    <a href="{{ route('organizer.rounds.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Reservations</h5>
                    <p>View all customer reservations</p>
                    <a href="{{ route('organizer.reservations') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Stats</h5>
                    <p>Spectators per round + available seats</p>
                    <a href="{{ route('organizer.stats') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
    </div>
@endsection