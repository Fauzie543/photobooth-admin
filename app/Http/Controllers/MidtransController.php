<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;

class MidtransController extends Controller
{
    public function getSnapToken(Order $order)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order->id,
                'gross_amount' => $order->frame->price,
            ],
            'customer_details' => [
                'first_name' => $order->client->name,
                'email' => $order->client->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);
        $order->snap_token = $snapToken;
        $order->order_id_midtrans = $params['transaction_details']['order_id'];
        $order->save();

        return response()->json(['snap_token' => $snapToken]);
    }

    public function handleCallback(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        $orderId = $payload['order_id'] ?? null;
        $status = $payload['transaction_status'] ?? null;

        $order = Order::where('order_id_midtrans', $orderId)->first();

        if ($order && $status === 'settlement') {
            $order->status = 'paid';
            $order->save();
        }

        return response()->json(['status' => 'ok']);
    }
}