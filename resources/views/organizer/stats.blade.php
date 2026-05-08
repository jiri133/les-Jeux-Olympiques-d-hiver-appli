@extends('layouts.app')

@section('title', 'Stats')

@section('content')
    <h1 class="mb-4">Stats</h1>

    <a href="{{ route('organizer.dashboard') }}" class="btn btn-secondary mb-3">← Back to Dashboard</a>

    <table class="table">
        <thead>
            <tr>
                <th>Sport</th>
                <th>Round</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Capacity</th>
                <th>Spectators</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rounds as $round)
                <tr>
                    <td>{{ $round->sport->name }}</td>
                    <td>{{ $round->name }}</td>
                    <td>{{ $round->venue->name }}</td>
                    <td>{{ $round->date->format('d M Y') }}</td>
                    <td>{{ $round->venue->capacity }}</td>
                    <td>{{ $round->spectators_count }}</td>
                    <td>{{ $round->venue->capacity - $round->spectators_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection