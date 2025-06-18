@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Orders</h1>

    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Client</th>
                <th>Frame</th>
                <th>Status</th>
                <th>Printed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-t">
                    <td class="p-2">{{ $order->client->name }}</td>
                    <td>{{ $order->frame->name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->printed ? 'Yes' : 'No' }}</td>
                    <td><a href="{{ route('orders.show', $order) }}" class="text-blue-600">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
