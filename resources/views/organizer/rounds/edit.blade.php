@extends('layouts.app')

@section('title', 'Edit Competition')

@section('content')
    <h1 class="mb-4">Edit Competition</h1>

    <a href="{{ route('organizer.rounds.index') }}" class="btn btn-secondary mb-3">← Back to list</a>

    <form method="POST" action="{{ route('organizer.rounds.update', $round->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Sport</label>
            <select name="sport_id" class="form-select" required>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}" {{ $round->sport_id == $sport->id ? 'selected' : '' }}>
                        {{ $sport->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Venue</label>
            <select name="venue_id" class="form-select" required>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ $round->venue_id == $venue->id ? 'selected' : '' }}>
                        {{ $venue->name }} (capacity: {{ $venue->capacity }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Round name</label>
            <input type="text" name="name" value="{{ $round->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="{{ $round->date->format('Y-m-d') }}" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Start time</label>
                <input type="time" name="start_time" value="{{ $round->start_time }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>End time</label>
                <input type="time" name="end_time" value="{{ $round->end_time }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Price (€)</label>
            <input type="number" name="price" value="{{ $round->price }}" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection