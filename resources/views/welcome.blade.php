@extends('layouts.app')

@section('title', 'Home — Winter Olympics 2026')

@section('content')
    <div class="text-center py-5">
        <p class="text-muted text-uppercase mb-2" style="letter-spacing: 3px;">Milano · Cortina · February 2026</p>
        <h1 class="display-3 fw-bold mb-3">Winter Olympics</h1>
        <p class="lead text-muted mb-4">
            Browse competitions, book your tickets, follow the games.
        </p>

        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ url('/calendar') }}" class="btn btn-primary btn-lg px-4">View Calendar</a>
            <a href="{{ url('/tickets') }}" class="btn btn-outline-primary btn-lg px-4">Buy Tickets</a>
        </div>
    </div>

    <hr class="my-5">

    <div class="row">
        <div class="col-md-4 mb-4">
            <h5>Calendar</h5>
            <p class="text-muted">All competitions sorted by day, with filters by sport.</p>
        </div>

        <div class="col-md-4 mb-4">
            <h5>Tickets</h5>
            <p class="text-muted">Book seats for any event, filter by price range.</p>
        </div>

        <div class="col-md-4 mb-4">
            <h5>5 Sports, 5 Venues</h5>
            <p class="text-muted">From Alpine Skiing to Ice Hockey at iconic Italian locations.</p>
        </div>
    </div>
@endsection