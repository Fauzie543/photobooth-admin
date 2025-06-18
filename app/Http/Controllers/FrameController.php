<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frame;
use Illuminate\Support\Facades\Storage;

class FrameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frames = Frame::all();
        return view('admin.frames.index', compact('frames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.frames.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png|max:2048',
            'price' => 'required|numeric',
            'total_slot' => 'required|integer|min:1'
        ]);

        $path = $request->file('image')->store('frames', 'public');

        Frame::create([
            'name' => $request->name,
            'image' => $path,
            'price' => $request->price,
            'total_slot' => $request->total_slot,
            'active' => true,
        ]);

        return redirect()->route('frames.index')->with('success', 'Frame created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frame $frame)
    {
        Storage::disk('public')->delete($frame->image);
        $frame->delete();

        return redirect()->route('frames.index')->with('success', 'Frame deleted successfully.');
    }
}