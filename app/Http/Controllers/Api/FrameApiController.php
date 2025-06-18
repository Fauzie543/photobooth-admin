<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use Illuminate\Http\Request;

class FrameApiController extends Controller
{
    public function index()
    {
        return Frame::where('active', true)->get();
    }
}