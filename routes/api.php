<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentLinkController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BookingController;

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);


Route::get('/inventories', [InventoryController::class, 'index']);


Route::post('/inventories', [InventoryController::class, 'store']);


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/payment-links', [PaymentLinkController::class, 'index']);
Route::post('/payment-links', [PaymentLinkController::class, 'create']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
