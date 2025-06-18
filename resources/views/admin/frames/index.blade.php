@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Frame List</h1>
    <a href="{{ route('frames.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add New Frame</a>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6">
        @foreach($frames as $frame)
            <div class="bg-white p-4 rounded shadow">
                <img src="{{ asset('storage/' . $frame->image) }}" class="w-full mb-2">
                <h2 class="text-lg font-semibold">{{ $frame->name }}</h2>
                <p>Price: Rp {{ number_format($frame->price) }}</p>
                <p>Slot: {{ $frame->total_slot }}</p>
                <form action="{{ route('frames.destroy', $frame) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf @method('DELETE')
                    <button class="mt-2 bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
