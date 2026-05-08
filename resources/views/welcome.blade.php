@extends('layouts.app')

@section('title', 'Dashboard — Winter Olympics 2026')

@section('content')
    <div class="text-center py-5">
        <h1 class="display-3 fw-bold mb-3">❄️ Winter Olympics 2026</h1>
        <p class="lead text-muted mb-4">
            Welcome to the official ticket platform for the 2026 Winter Games in Milano-Cortina.
        </p>

        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ url('/calendar') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-calendar-event"></i> View Calendar
            </a>
            <a href="{{ url('/tickets') }}" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-ticket-perforated"></i> Buy Tickets
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 mb-3">📅</div>
                    <h5 class="card-title">Browse the Calendar</h5>
                    <p class="card-text text-muted">
                        Check out all competitions by day, sport, and venue.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 mb-3">🎟️</div>
                    <h5 class="card-title">Book Your Tickets</h5>
                    <p class="card-text text-muted">
                        Reserve seats for one or multiple events with easy filters.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 mb-3">🏔️</div>
                    <h5 class="card-title">5 Sports, 5 Venues</h5>
                    <p class="card-text text-muted">
                        From Alpine Skiing to Ice Hockey at Italy's iconic locations.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection