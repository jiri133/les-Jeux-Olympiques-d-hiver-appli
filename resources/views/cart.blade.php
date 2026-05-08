@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <h1 class="mb-4">Your Cart</h1>

    @if(count($rounds) === 0)
        <p>Your cart is empty. <a href="/tickets">Browse tickets</a></p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Sport</th>
                    <th>Round</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($rounds as $item)
                    <tr>
                        <td>{{ $item['round']->sport->name }}</td>
                        <td>{{ $item['round']->name }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['subtotal'] }} €</td>
                        <td>
                            <form method="POST" action="/cart/remove">
                                @csrf
                                <input type="hidden" name="round_id" value="{{ $item['round']->id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total: {{ $total }} €</h3>
        <a href="/checkout" class="btn btn-primary">Checkout</a>
    @endif
@endsection