<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use Illuminate\Http\Request;

class FrameController extends Controller
{
    public function index()
    {
        return Frame::where('active', true)->get();
    }
    
    public function show($id)
    {
        $frame = Frame::findOrFail($id);

        // Tambahkan full path untuk image
        $frame->image_url = $frame->image ? asset('storage/' . $frame->image) : null;

        return response()->json($frame);
    }
}