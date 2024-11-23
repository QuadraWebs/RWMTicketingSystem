<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckInController;

Route::get('/viewticket/{uuid}', [TicketController::class, 'viewByUuid'])->name('ticket.view');
Route::get('/', [TicketController::class, 'index'])->name('welcome');

Route::post('/ticket/checkin', [TicketController::class, 'checkin'])->name('ticket.checkin');

Route::post('/ticket/confirm-checkin', [TicketController::class, 'confirmCheckin'])->name('ticket.confirm-checkin');
Route::get('/verify-ticket/{uuid}', [TicketController::class, 'verifyTicket'])
    ->name('ticket.verify')
    ->middleware('signed');

Route::post('/verify-ticket/{ticket}/accept', [TicketController::class, 'acceptTicket'])->name('ticket.verify.accept');
Route::post('/verify-ticket/{ticket}/reject', [TicketController::class, 'rejectTicket'])->name('ticket.verify.reject');



