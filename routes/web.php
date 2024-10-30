<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ArenaController;
use App\Http\Controllers\TarifController;

use App\Http\Controllers\FieldController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PaymentController; 

use App\Http\Controllers\Frontend\LapanganController as FrontendLapanganController;
use App\Http\Controllers\Frontend\TarifController as FrontendTarifController;
use App\Http\Controllers\Frontend\BookingController as FrontendBookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TarifSessionController;
use App\Http\Controllers\KontakController;


// Route for welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/jadwal', function () {
    return view(view: 'jadwal');
})->name('jadwal');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');

Route::get('/menu', function () {   
    return view('menu');
});

// Route::get('/lapangan', [FrontendLapanganController::class, 'index'])->name('lapangan.index');

// Route::get('/lapangan/{id}', [LapanganController::class, 'show'])->name('lapangan.detail');

Route::get('/tarif-sessions', [TarifSessionController::class, 'index'])->name('tarif_sessions.index');
Route::get('/tarif-sessions', [FieldController::class, 'index'])->name('lapangan.index');

// Halaman pemesanan lapangan
Route::get('/', [OrderController::class, 'showFields'])->name('welcome');
// Route::get('/fields', [OrderController::class, 'showFields'])->name('fields.index');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// Proses pemesanan
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


// Route::post('/midtrans-callback', [OrderController::class, 'callback']);
Route::get('/invoice/{id}', [OrderController::class, 'showInvoice'])->name('invoice');
Route::get('/invoice/{order_id}', [OrderController::class, 'showInvoice'])->name('invoice.show');
Route::get('/assets', [OrderController::class, 'assets'])->name('pdf.assets');
Route::get('/fields/{fieldId}', [OrderController::class, 'showBooking'])->name('fields.index');
Route::get('/fields', [OrderController::class, 'indexWithoutFieldId'])->name('fields.indexWithoutFieldId');

Route::post('/payment/create', [PaymentController::class, 'createTransaction'])->name('payment.create');
Route::get('/api/get-snap-token', [PaymentController::class, 'createTransaction']);

Route::resource('orders', OrderController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/admin/manager', [AdminController::class, 'manager'])->middleware('userAkses:manager')->name('manager');
        Route::get('/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin')->name('admin');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::resource('user', HomeController::class)->except(['show']);
        Route::resource('lapangan', FieldController::class)->except(['show']);  
        Route::delete('/admin/lapangan/{field}', [FieldController::class, 'destroy'])->name('admin.lapangan.destroy');  
        Route::resource('tarif', controller: TarifController::class)->except(['show']);
        
        Route::resource('tarifsession', TarifSessionController::class)->except(['show']);
        Route::resource('tarif-sessions', TarifSessionController::class);
        // Route::resource('tarif_sessions', TarifSessionController::class);
        Route::resource('admin/tarif_sessions', TarifSessionController::class);
        Route::resource('orders', OrderController::class);

        Route::get('/messages', [KontakController::class, 'index'])->name('messages');
        Route::delete('/messages/{id}', [KontakController::class, 'destroy'])->name('messages.destroy');

        Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');


    });
});

Route::get('/home', function () {
    return redirect('/');
});









// Routes untuk Order dan Pembayaran
// Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout'); 
// Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');

// Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');

// Route::post('/checkout', [BookingController::class, 'store'])->name('checkout.store');

// Route::get('/tarifs', [TarifController::class, 'index'])->name('tarifs.index'); 

// Route::get('/booking', [FrontendBookingController::class, 'index'])->name('booking.index');

// // Callback untuk Midtrans Notification
// Route::post('/payment/notification', [OrderController::class, 'callback']);

// Route::get('/tariffs', [FrontendTarifController::class, 'index'])->name('tariffs.index');

// Route::get('/lapangan/{id}', [FieldController::class, 'show'])->name('lapangan.show');
// Route::get('/field/{id}', [FieldController::class, 'show'])->name('lapangan.show');
// Route::get('/field', [FieldController::class, 'index'])->name('lapangan.index');

//  // Add the route for saving the schedule
//  Route::post('/save-schedule', 'ScheduleController@store')->name('save-schedule');

// Route::get('/Booking/step-one', [FrontendBookingController::class, 'stepOne'])->name('Booking.step.one');
// Route::get('/Booking/step-two', [FrontendBookingController::class, 'stepTwo'])->name('Booking.step.two');

// Route::resource('booking', BookingController::class)->except(['show']);
        // Route::delete('/admin/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.delete');
        // Route::resource('arena', ArenaController::class)->except(['show']);
        // Route::delete('/admin/arena/{arena}', [ArenaController::class, 'destroy'])->name('arena.delete');

        // Route::get('/admin/bookings', [BookingController::class, 'showBookings'])->name('admin.booking');
        // Route::patch('/admin/bookings/{id}/update', [BookingController::class, 'updateBookingStatus'])->name('admin.updateBookingStatus');

        // Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');