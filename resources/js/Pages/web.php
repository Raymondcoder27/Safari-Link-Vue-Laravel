<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Route::get('/dashboard', fn() => Inertia::render('Dashboard/Home'));
Route::get('/inventory', fn() => Inertia::render('Dashboard/Inventory'))->middleware(['auth', 'verified'])->name('inventory');
// Route::get('/bookings', fn() => Inertia::render('Dashboard/Bookings'));
Route::get('/customers', fn() => Inertia::render('Dashboard/Customers'));
Route::get('/finance', fn() => Inertia::render('Dashboard/Finance/Finance'));
Route::get('/payment-links', fn() => Inertia::render('Dashboard/Finance/PaymentLinks/PaymentLinks'));
Route::get('/payment-links-details', fn() => Inertia::render('Dashboard/Finance/PaymentLinks/PaymentLinkDetails'));
Route::get('/beneficiaries', fn() => Inertia::render('Dashboard/Beneficiaries'));
Route::get('/mybusiness', fn() => Inertia::render('Dashboard/MyBusiness'));

Route::get('/pricing', function () {
    return Inertia::render('Pricing');
})->name('pricing');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bookings', function () {
    return Inertia::render('Dashboard/Bookings');
})->middleware(['auth', 'verified'])->name('bookings');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
