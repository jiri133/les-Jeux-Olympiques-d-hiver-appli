@extends('layouts.app')

@section('title', 'Calendar — Winter Olympics 2026')

@section('content')
    <div class="mb-4">
        <h1 class="display-5 fw-bold">Olympic Calendar</h1>
        <p class="text-muted">All competitions sorted by day</p>
    </div>

    <form method="GET" action="{{ route('calendar') }}" class="mb-4">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label for="sport_id" class="form-label">Filter by sport</label>
                <select name="sport_id" id="sport_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All sports</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->id }}" {{ $selectedSport == $sport->id ? 'selected' : '' }}>
                            {{ $sport->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if($selectedSport)
                <div class="col-md-2">
                    <a href="{{ route('calendar') }}" class="btn btn-outline-secondary w-100">Clear filter</a>
                </div>
            @endif
        </div>
    </form>

    @forelse($roundsByDay as $day => $rounds)
        <div class="mb-4">
            <h3 class="border-bottom pb-2 mb-3">
                <i class="bi bi-calendar-event"></i>
                {{ \Carbon\Carbon::parse($day)->format('l, F j, Y') }}
            </h3>

            <div class="row g-3">
                @foreach($rounds as $round)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $round->sport->name }}</h5>
                                <span class="badge bg-secondary text-uppercase mb-2">{{ $round->name }}</span>

                                <ul class="list-unstyled small text-muted mb-0">
                                    <li><i class="bi bi-geo-alt"></i> {{ $round->venue->name }}</li>
                                    <li><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($round->start_time)->format('H:i') }} – {{ \Carbon\Carbon::parse($round->end_time)->format('H:i') }}</li>
                                    <li><i class="bi bi-tag"></i> {{ number_format($round->price, 2) }} €</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> No competitions found for this filter.
        </div>
    @endforelse
@endsection