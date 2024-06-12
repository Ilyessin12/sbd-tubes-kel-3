<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Bagian Controller Frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\RiwayatController;

//Bagian Controller Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminEkstraController;
use App\Http\Controllers\Admin\AdminFasilitasController;
use App\Http\Controllers\Admin\AdminVoucherController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminBookingController;

/*
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
*/

/*
Route::get('/', function () {
    return view('frontend.welcome');
});
*/

//Routing untuk Bagian Frontend
// Beranda
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

//Booking
Route::get('/booking', [BookingController::class, 'index'])->name('frontend.booking');
Route::post('/booking', [BookingController::class, 'store'])->name('frontend.booking.store');
//redirect ke checkout setelah store
Route::get('/checkout/{id}', [BookingController::class, 'checkout'])->name('frontend.checkout');
//simulasi bayar
Route::get('/checkout/pay/{id}', 'App\Http\Controllers\Frontend\BookingController@updateStatusAndRedirect')->name('booking.updateStatus');


//Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index']);

//Routing untuk Bagian Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin');
//untuk redirect ke dashboard jika ada yang mengetik "/admin" di url
Route::redirect('/admin', '/admin/dashboard');


// <!-- ? ==================== CRUD Admin ==================== ? -->

//Customer
Route::get('/admin/customer', [AdminCustomerController::class, 'index'])->middleware('admin')->name('admin.customer.index');
Route::get('/admin/customer/create', [AdminCustomerController::class, 'create'])->middleware('admin')->name('admin.customer.create');
Route::post('/admin/customer', [AdminCustomerController::class, 'store'])->middleware('admin')->name('admin.customer.store');
Route::get('/admin/customer/{id}/edit', [AdminCustomerController::class, 'edit'])->middleware('admin')->name('admin.customer.edit');
Route::put('/admin/customer/{id}/edit', [AdminCustomerController::class, 'update'])->middleware('admin')->name('admin.customer.update');
Route::get('/admin/customer/{id}/delete', [AdminCustomerController::class, 'destroy'])->middleware('admin')->name('admin.customer.delete');

//Booking
Route::get('/admin/booking', [AdminBookingController::class, 'index'])->middleware('admin')->name('admin.booking.index');
Route::get('/admin/booking/create', [AdminBookingController::class, 'create'])->middleware('admin')->name('admin.booking.create');
Route::post('/admin/booking', [AdminBookingController::class, 'store'])->middleware('admin')->name('admin.booking.store');
Route::get('/admin/booking/{id}/edit', [AdminBookingController::class, 'edit'])->middleware('admin')->name('admin.booking.edit');
Route::put('/admin/booking/{id}/edit', [AdminBookingController::class, 'update'])->middleware('admin')->name('admin.booking.update');
Route::get('/admin/booking/{id}/delete', [AdminBookingController::class, 'destroy'])->middleware('admin')->name('admin.booking.delete');

//Ekstra
Route::get('/admin/ekstra', [AdminEkstraController::class, 'index'])->middleware('admin')->name('admin.ekstra.index');
Route::get('/admin/ekstra/create', [AdminEkstraController::class, 'create'])->middleware('admin')->name('admin.ekstra.create');
Route::post('/admin/ekstra', [AdminEkstraController::class, 'store'])->middleware('admin')->name('admin.ekstra.store');
Route::get('/admin/ekstra/{id}/edit', [AdminEkstraController::class, 'edit'])->middleware('admin')->name('admin.ekstra.edit');
Route::put('/admin/ekstra/{id}/edit', [AdminEkstraController::class, 'update'])->middleware('admin')->name('admin.ekstra.update');
Route::get('/admin/ekstra/{id}/delete', [AdminEkstraController::class, 'destroy'])->middleware('admin')->name('admin.ekstra.delete');

//Fasilitas
Route::get('/admin/fasilitas', [AdminFasilitasController::class, 'index'])->middleware('admin')->name('admin.fasilitas.index');
Route::get('/admin/fasilitas/create', [AdminFasilitasController::class, 'create'])->middleware('admin')->name('admin.fasilitas.create');
Route::post('/admin/fasilitas', [AdminFasilitasController::class, 'store'])->middleware('admin')->name('admin.fasilitas.store');
Route::get('/admin/fasilitas/{id}/edit', [AdminFasilitasController::class, 'edit'])->middleware('admin')->name('admin.fasilitas.edit');
Route::put('/admin/fasilitas/{id}/edit', [AdminFasilitasController::class, 'update'])->middleware('admin')->name('admin.fasilitas.update');
Route::get('/admin/fasilitas/{id}/delete', [AdminFasilitasController::class, 'destroy'])->middleware('admin')->name('admin.fasilitas.delete');

//Voucher
Route::get('/admin/voucher', [AdminVoucherController::class, 'index'])->middleware('admin')->name('admin.voucher.index');
Route::get('/admin/voucher/create', [AdminVoucherController::class, 'create'])->middleware('admin')->name('admin.voucher.create');
Route::post('/admin/voucher', [AdminVoucherController::class, 'store'])->middleware('admin')->name('admin.voucher.store');
Route::get('/admin/voucher/{id}/edit', [AdminVoucherController::class, 'edit'])->middleware('admin')->name('admin.voucher.edit');
Route::put('/admin/voucher/{id}/edit', [AdminVoucherController::class, 'update'])->middleware('admin')->name('admin.voucher.update');
Route::get('/admin/voucher/{id}/delete', [AdminVoucherController::class, 'destroy'])->middleware('admin')->name('admin.voucher.delete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
// Yg di bawah ini temporary buat testing, hapus aja nanti
Route::get('/form-booking', function(){
    return view('frontend.create-booking');
});
Route::get('/tes-dashboard', function(){
    return view('admin.dashboard');
});
Route::get('/tes-admin/booking', function(){
    return view('admin.booking.index');
});
Route::get('/tes-admin/voucher', function(){
    return view('admin.voucher.index');
});
Route::get('/tes-admin/customer', function(){
    return view('admin.customer.index');
});
*/