<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Auth\LoginController;
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/admin/subscribers', [SubscriberController::class, 'index'])->name('admin.subscribers');
    Route::get('/subscribers/create', [SubscriberController::class, 'create'])->name('admin.subscribers.create');
    Route::post('/subscribers', [SubscriberController::class, 'store'])->name('admin.subscribers.store');
    Route::get('/subscriber/{uuid}', [SubscriberController::class, 'show'])->name('subscriber.view');
    Route::get('/subscribers/{user}/edit', [SubscriberController::class, 'edit'])->name('admin.subscribers.edit');
    Route::put('/subscribers/{user}', [SubscriberController::class, 'update'])->name('admin.subscribers.update');
    Route::delete('/subscribers/{user}', [SubscriberController::class, 'destroy'])->name('admin.subscribers.destroy');


    Route::get('/admin/package', [PackageController::class, 'index'])->name('admin.package');
    Route::get('/admin/package/add', [PackageController::class, 'create'])->name('admin.package.add');
    Route::post('/admin/package/store', [PackageController::class, 'store'])->name('admin.package.store');

    Route::get('/admin/history', [HistoryController::class, 'index'])->name('admin.history');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



});


Route::get('/viewticket/{uuid}', action: [TicketController::class, 'viewByUuid'])->name('ticket.view');
Route::get('/', [TicketController::class, 'index'])->name('welcome');

Route::post('/ticket/checkin/{uuid}', [TicketController::class, 'checkin'])->name('ticket.checkin');


Route::post('/ticket/confirm-checkin', [TicketController::class, 'confirmCheckin'])->name('ticket.confirm-checkin');
Route::get('/verify-ticket/{uuid}', [TicketController::class, 'verifyTicket'])
    ->name('ticket.verify')
    ->middleware(['throttle:60,1']);

Route::post('/verify-ticket/{ticket}/{uuid}/accept', [TicketController::class, 'acceptTicket'])->name('ticket.verify.accept');
Route::post('/verify-ticket/{ticket}/{uuid}/reject', [TicketController::class, 'rejectTicket'])->name('ticket.verify.reject');

