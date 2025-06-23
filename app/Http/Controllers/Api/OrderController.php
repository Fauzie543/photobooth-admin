<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'frame_id' => 'required|exists:frames,id',
            'amount' => 'required|numeric',
        ]);

        $client = Client::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone
            ]
        );

        $order = Order::create([
            'client_id' => $client->id,
            'frame_id' => $request->frame_id,
            'status' => 'pending',
            'total_price' => $request->amount
        ]);

        return response()->json($order);
    }

    public function show($id)
    {
        return Order::with('client', 'frame')->findOrFail($id);
    }

    public function uploadPhoto(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $order->photo = $path;
            $order->save();
        }

        return response()->json(['photo_url' => asset('storage/' . $order->photo)]);
    }
}