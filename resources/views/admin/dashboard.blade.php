@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Clients</h2>
            <p class="text-2xl">{{ $totalClients }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Frames</h2>
            <p class="text-2xl">{{ $totalFrames }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Orders</h2>
            <p class="text-2xl">{{ $totalOrders }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Printed</h2>
            <p class="text-2xl">{{ $totalPrinted }}</p>
        </div>
    </div>
@endsection
