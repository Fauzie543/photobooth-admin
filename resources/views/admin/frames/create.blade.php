@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Frame</h1>

    <form action="{{ route('frames.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label for="image" class="block font-medium">Frame Image (PNG)</label>
            <input type="file" name="image" id="image" class="w-full p-2 border rounded" accept="image/png" required>
        </div>
        <div>
            <label for="price" class="block font-medium">Price</label>
            <input type="number" name="price" id="price" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label for="total_slot" class="block font-medium">Total Slot</label>
            <input type="number" name="total_slot" id="total_slot" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection