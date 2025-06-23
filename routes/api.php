<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrameController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;


Route::get('/frames', [FrameController::class, 'index']);

Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::post('/orders/{id}/upload', [OrderController::class, 'uploadPhoto']);
Route::post('/payment-token', [PaymentController::class, 'getSnapToken']);
Route::get('/frames/{id}', [FrameController::class, 'show']);

Route::post('/upload-final-photo', function (Illuminate\Http\Request $request) {
    $data = $request->validate([
        'photo' => 'required|string',
        'filename' => 'required|string',
    ]);

    $image = str_replace('data:image/jpeg;base64,', '', $data['photo']);
    $image = str_replace(' ', '+', $image);
    $filename = $data['filename'];

    $path = storage_path('app/public/final/' . $filename);
    file_put_contents($path, base64_decode($image));

    return response()->json(['success' => true, 'path' => $path]);
});