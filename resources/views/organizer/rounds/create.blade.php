@extends('layouts.app')

@section('title', 'Add Competition')

@section('content')
    <h1 class="mb-4">Add Competition</h1>

    <a href="{{ route('organizer.rounds.index') }}" class="btn btn-secondary mb-3">← Back to list</a>

    <form method="POST" action="{{ route('organizer.rounds.store') }}">
        @csrf

        <div class="mb-3">
            <label>Sport</label>
            <select name="sport_id" class="form-select" required>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Venue</label>
            <select name="venue_id" class="form-select" required>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}">{{ $venue->name }} (capacity: {{ $venue->capacity }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Round name</label>
            <input type="text" name="name" class="form-control" placeholder="qualifications, final, semifinal, etc." required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Start time</label>
                <input type="time" name="start_time" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>End time</label>
                <input type="time" name="end_time" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Price (€)</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection