@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <h1 class="mb-4">Tickets</h1>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="number" name="min_price" value="{{ request('min_price') }}" class="form-control" placeholder="Min price">
        </div>
        <div class="col-md-3">
            <input type="number" name="max_price" value="{{ request('max_price') }}" class="form-control" placeholder="Max price">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="/tickets" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
    </form>

    <div class="row g-3">
        @foreach($rounds as $round)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>{{ $round->sport->name }}</h5>
                        <p class="text-muted">{{ $round->name }}</p>
                        <p>Venue: {{ $round->venue->name }}</p>
                        <p>Date: {{ $round->date->format('d M Y') }}</p>
                        <p>Time: {{ $round->start_time }} - {{ $round->end_time }}</p>
                        <p class="fw-bold">Price: {{ $round->price }} €</p>

                        <form method="POST" action="/cart/add">
                            @csrf
                            <input type="hidden" name="round_id" value="{{ $round->id }}">
                            <button type="submit" class="btn btn-success w-100">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection