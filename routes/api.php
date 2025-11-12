<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentLinkController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BeneficiaryController;

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);


Route::get('/inventories', [InventoryController::class, 'index']);

    Route::get('itineraries', [ItineraryController::class, 'index']);
    Route::get('itineraries/{id}', [ItineraryController::class, 'show']);
    Route::post('itineraries', [ItineraryController::class, 'store']);

Route::post('/inventories', [InventoryController::class, 'store']);

use App\Http\Controllers\BeneficiariesController;

Route::get('/beneficiaries', [BeneficiariesController::class, 'index']);
Route::post('/beneficiaries', [BeneficiariesController::class, 'store']);
Route::get('/beneficiaries/{id}', [BeneficiariesController::class, 'show']);
Route::put('/beneficiaries/{id}', [BeneficiariesController::class, 'update']);
Route::delete('/beneficiaries/{id}', [BeneficiariesController::class, 'destroy']);

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
