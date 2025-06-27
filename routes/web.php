<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/download/{filename}', function ($filename) {
    $path = storage_path("app/public/final/" . $filename);
    return response()->download($path);
});