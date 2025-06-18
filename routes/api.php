<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrameApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\PaymentController;


Route::get('/frames', [FrameApiController::class, 'index']);
Route::post('/orders', [OrderApiController::class, 'store']);
Route::get('/orders/{id}', [OrderApiController::class, 'show']);
Route::post('/orders/{id}/upload', [OrderApiController::class, 'uploadPhoto']);
Route::post('/payment-token', [PaymentController::class, 'getSnapToken']);