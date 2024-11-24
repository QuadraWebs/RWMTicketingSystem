<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckInController;
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/viewticket/{uuid}', [TicketController::class, 'viewByUuid'])->name('ticket.view');
    Route::get('/', [TicketController::class, 'index'])->name('welcome');

    Route::post('/ticket/checkin/{uuid}', [TicketController::class, 'checkin'])->name('ticket.checkin');


    Route::post('/ticket/confirm-checkin', [TicketController::class, 'confirmCheckin'])->name('ticket.confirm-checkin');
    Route::get('/verify-ticket/{uuid}', [TicketController::class, 'verifyTicket'])
        ->name('ticket.verify')
        ->middleware('signed');

    Route::post('/verify-ticket/{ticket}/{uuid}/accept', [TicketController::class, 'acceptTicket'])->name('ticket.verify.accept');
    Route::post('/verify-ticket/{ticket}/{uuid}/reject', [TicketController::class, 'rejectTicket'])->name('ticket.verify.reject');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

