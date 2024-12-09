<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Package;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/admin/subscribers', [SubscriberController::class, 'index'])->name('admin.subscribers');
    Route::get('/subscribers/create', [SubscriberController::class, 'create'])->name('admin.subscribers.create');

    Route::get('/subscriber/{uuid}', [SubscriberController::class, 'show'])->name('subscriber.view');
    Route::get('/subscribers/{user}/edit', [SubscriberController::class, 'edit'])->name('admin.subscribers.edit');
    Route::post('/subscribers', [SubscriberController::class, 'create'])->name('admin.subscribers.store');
    Route::post('/admin/subscribers/store', [SubscriberController::class, 'store_new'])
        ->name('admin.subscribers.store_new');
    Route::get('/admin/subscribers/add/successful', function () {
        return view('admin.subscriber.add_successful');
    })->name('admin.subscribers.add.successful');
    Route::get('/admin/subscribers/add/failed', function () {
        return view('admin.subscriber.add_failed');
    })->name('admin.subscribers.add.failed');
    Route::get('/subscribers/{uuid}/tickets/{ticket}/edit', [SubscriberController::class, 'edit_user_ticket'])
        ->name('admin.subscribers.edit_user_ticket');
    Route::put('/subscriber/{uuid}/tickets/{ticket}', [SubscriberController::class, 'updateUserTicket'])
        ->name('admin.subscribers.update_user_ticket');
    Route::delete('/subscribers/{user}', [SubscriberController::class, 'destroy'])->name('admin.subscribers.destroy');
    Route::delete('/admin/subscribers/{uuid}/tickets/{ticket}', [App\Http\Controllers\SubscriberController::class, 'destroyUserTicket'])
        ->name('admin.subscribers.destroy_user_ticket');
    Route::delete('/subscribers/{user}', [SubscriberController::class, 'destroy'])
        ->name('admin.subscribers.destroy');
    Route::put('/subscribers/{user}', [SubscriberController::class, 'update'])->name('admin.subscribers.update');




    Route::get('/admin/package', [PackageController::class, 'index'])->name('admin.package');
    Route::get('/admin/package/add', [PackageController::class, 'create'])->name('admin.package.add');
    Route::post('/admin/package/store', [PackageController::class, 'store'])->name('admin.package.store');
    Route::get('/admin/package/{id}/edit', [PackageController::class, 'edit'])->name('admin.package.edit');
    Route::delete('/admin/package/{id}', [PackageController::class, 'destroy'])->name('admin.package.destroy');
    Route::put('/admin/package/{id}', [PackageController::class, 'update'])->name('admin.package.update');
    Route::get('/admin/package/update/successful', function () {
        return view('admin.package.update_successful');
    })->name('admin.package.update.successful');
    Route::get('/admin/package/update/failed', function () {
        return view('admin.package.update_failed');
    })->name('admin.package.update.failed');
    Route::get('/admin/package/add/successful', function () {
        return view('admin.package.add_successful');
    })->name('admin.package.add.successful');
    Route::get('/admin/package/add/failed', function () {
        return view('admin.package.add_failed');
    })->name('admin.package.add.failed');



    Route::get('/admin/cafe', [CafeController::class, 'index'])->name('admin.cafe');
    Route::get('/admin/cafe/add', [CafeController::class, 'create'])->name('admin.cafe.add');
    Route::post('/admin/cafe', [CafeController::class, 'store'])->name('admin.cafe.store');
    Route::get('/admin/cafe/{id}/edit', [CafeController::class, 'edit'])->name('admin.cafe.edit');
    Route::put('/admin/cafe/{id}', [CafeController::class, 'update'])->name('admin.cafe.update');
    Route::delete('/admin/cafe/{id}', [CafeController::class, 'destroy'])->name('admin.cafe.destroy');
    Route::get('/admin/cafe/update/successful', function () {
        return view('admin.cafe.update_successful');
    })->name('admin.cafe.update.successful');
    Route::get('/admin/cafe/update/failed', function () {
        return view('admin.cafe.update_failed');
    })->name('admin.cafe.update.failed');
    Route::get('/admin/cafe/add/successful', function () {
        return view('admin.cafe.add_successful');
    })->name('admin.cafe.add.successful');
    Route::get('/admin/cafe/add/failed', function () {
        return view('admin.cafe.add_failed');
    })->name('admin.cafe.add.failed');



    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



});

// Custom error pages
Route::get('/401', function () {
    return view('errors.401');
})->name('401');

Route::get('/404', function () {
    return view(view: 'errors.404');
})->name('404');


Route::get('/packages', function () {
    $packages = Package::all();
    return view('packages', compact('packages'));
})->name('packages');
Route::get('/viewticket/{uuid}', action: [TicketController::class, 'viewByUuid'])->name('ticket.view');
Route::get('/', function () {
    return view(view: 'errors.404');
})->name('welcome');
Route::post('/ticket/checkin/{uuid}', [TicketController::class, 'checkin'])->name('ticket.checkin');


Route::post('/ticket/confirm-checkin', [TicketController::class, 'confirmCheckin'])->name('ticket.confirm-checkin');
Route::get('/verify-ticket/{uuid}', [TicketController::class, 'verifyTicket'])
    ->name('ticket.verify');
Route::get('/workspace-practice-verify-ticket', [TicketController::class, 'workSpacePracticeVerifyTicket'])
->name('ticket.practice.verify');
Route::get('/workspace-practice-allin-verify-ticket', [TicketController::class, 'workSpacePracticeAllInVerifyTicket'])
->name('ticket.practice.allin.verify');

Route::post('/verify-ticket/{ticket}/{uuid}/accept', [TicketController::class, 'acceptTicket'])->name('ticket.verify.accept');
Route::post('/verify-ticket/{ticket}/{uuid}/reject', [TicketController::class, 'rejectTicket'])->name('ticket.verify.reject');
Route::post('/verify-ticket/workspace-practice-accept', [TicketController::class, 'workSpacePracticeAcceptTicket'])->name('ticket.practice.verify.accept');
Route::post('/verify-ticket/workspace-practice-reject', [TicketController::class, 'workSpacePracticeRejectTicket'])->name('ticket.practice.verify.reject');
Route::post('/verify-ticket/workspace-practice-allin-accept', [TicketController::class, 'workSpacePracticeAllInAcceptTicket'])->name('ticket.practice.allin.verify.accept');
Route::post('/verify-ticket/workspace-practice-allin-reject', [TicketController::class, 'workSpacePracticeAllInRejectTicket'])->name('ticket.practice.allin.verify.reject');

Route::get('/health', function () {
    return response('OK', 200);
});

Route::get('/schedule/run-all', function () {
    Artisan::call('tickets:update-expired');
    
    Artisan::call('tickets:check-ending');
    
    Artisan::call('tickets:check-ended');
    
    return response('All ticket schedules executed successfully', 200);
});