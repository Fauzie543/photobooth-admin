<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Frame;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();
        $totalFrames = Frame::count();
        $totalOrders = Order::count();
        $totalPrinted = Order::where('printed', true)->count();

        return view('admin.dashboard', compact(
            'totalClients', 'totalFrames', 'totalOrders', 'totalPrinted'
        ));
    }
}