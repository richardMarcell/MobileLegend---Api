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
    });
});

