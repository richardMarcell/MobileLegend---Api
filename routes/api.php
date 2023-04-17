<?php

use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('v1')->group(function() {
        Route::prefix('heroes')->name('heroes')->group(function() {
            Route::get('/', [HeroController::class, 'index'])->name('index');
            Route::get('/{hero}', [HeroController::class, 'show'])->name('show');
            Route::post('/', [HeroController::class, 'store'])->name('store');
            Route::put('/{hero}', [HeroController::class, 'update'])->name('update');
            Route::delete('/{hero}', [HeroController::class, 'destroy'])->name('destroy');
        });
    
        // Route::prefix()->name()->group(function() {
    
        // });
    
        // Route::prefix()->name()->group(function() {
    
        // });
    });
});


// Route::prefix('v1')->group(function() {
//     Route::prefix('basketball-courts')->name('basketball-courts.')->group(function() {
//         Route::get('/', [BasketBallCourtController::class, 'index'])->name('index');
//         Route::get('/{court}', [BasketBallCourtController::class, 'show'])->name('show');
//         Route::post('/', [BasketBallCourtController::class, 'store'])->name('store');
//         Route::put('/{court}', [BasketBallCourtController::class, 'update'])->name('update');
//         Route::delete('/{court}', [BasketBallCourtController::class, 'destroy'])->name('delete');
//     });

//     Route::prefix('booking')->name('booking.')->group(function() {
//         Route::get('/', [BookingController::class, 'index'])->name('index');
//         Route::post('/', [BookingController::class, 'store'])->name('store');
//     });

//     Route::prefix('join')->name('join.')->group(function() {
//         Route::get('/', [BookingController::class, 'index'])->name('index');
//         Route::post('/}', [BookingController::class, 'store'])->name('store');
//     });

//     Route::get('basketball-courts-order', [BasketBallCourtsOrderController::class, 'index'])->name('basketball-courts-order.index');

//     Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
// });

