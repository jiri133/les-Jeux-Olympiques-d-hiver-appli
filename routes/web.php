<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\Organizer\RoundController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [ReservationController::class, 'create'])->name('checkout');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{id}/confirmation', [ReservationController::class, 'confirmation'])->name('reservations.confirmation');

Route::prefix('organizer')->name('organizer.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [OrganizerController::class, 'dashboard'])->name('dashboard');
    Route::get('/reservations', [OrganizerController::class, 'reservations'])->name('reservations');
    Route::get('/stats', [OrganizerController::class, 'stats'])->name('stats');
    Route::resource('rounds', RoundController::class);
});

require __DIR__.'/auth.php';