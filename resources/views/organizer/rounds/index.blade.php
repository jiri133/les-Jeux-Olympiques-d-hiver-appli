@extends('layouts.app')

@section('title', 'Manage Competitions')

@section('content')
    <h1 class="mb-4">Manage Competitions</h1>

    <a href="{{ route('organizer.dashboard') }}" class="btn btn-secondary mb-3">← Back to Dashboard</a>
    <a href="{{ route('organizer.rounds.create') }}" class="btn btn-success mb-3">+ Add new competition</a>

    <table class="table">
        <thead>
            <tr>
                <th>Sport</th>
                <th>Round</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Time</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rounds as $round)
                <tr>
                    <td>{{ $round->sport->name }}</td>
                    <td>{{ $round->name }}</td>
                    <td>{{ $round->venue->name }}</td>
                    <td>{{ $round->date->format('d M Y') }}</td>
                    <td>{{ $round->start_time }} - {{ $round->end_time }}</td>
                    <td>{{ $round->price }} €</td>
                    <td>
                        <a href="{{ route('organizer.rounds.edit', $round->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form method="POST" action="{{ route('organizer.rounds.destroy', $round->id) }}" class="d-inline" onsubmit="return confirm('Delete this competition?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection