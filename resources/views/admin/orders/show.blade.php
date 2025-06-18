@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Order Detail</h1>

    <div class="mb-4">
        <p><strong>Client:</strong> {{ $order->client->name }}</p>
        <p><strong>Frame:</strong> {{ $order->frame->name }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Printed:</strong> {{ $order->printed ? 'Yes' : 'No' }}</p>
    </div>

    @if ($order->photo)
        <div class="mb-4">
            <p><strong>Photo:</strong></p>
            <img src="{{ asset('storage/' . $order->photo) }}" class="w-64">
        </div>
    @endif

    <form method="POST" action="{{ route('orders.updateStatus', $order) }}">
        @csrf
        @method('PATCH')
        <div class="mb-2">
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="done" {{ $order->status === 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <div class="mb-4">
            <label>
                <input type="checkbox" name="printed" {{ $order->printed ? 'checked' : '' }}> Printed
            </label>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection