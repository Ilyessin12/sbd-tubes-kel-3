<?php

use App\Http\Controllers\Admin\AdminEkstraController;
use App\Http\Controllers\Admin\AdminFasilitasController;
use App\Http\Controllers\Admin\AdminVoucherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Bagian Controller Frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\RiwayatController;

//Bagian Controller Admin
use App\Http\Controllers\Admin\DashboardController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/booking', [BookingController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'index']);

//Routing untuk Bagian Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin');
//untuk redirect ke dashboard jika ada yang mengetik "/admin" di url
Route::redirect('/admin', '/admin/dashboard');


//Ekstra
Route::get('/admin/ekstra', [AdminEkstraController::class, 'index'])->middleware('admin');
Route::get('/admin/ekstra/create', [AdminEkstraController::class, 'create'])->middleware('admin');
Route::post('/admin/ekstra', [AdminEkstraController::class, 'store'])->middleware('admin');
Route::get('/admin/ekstra/{id}/edit', [AdminEkstraController::class, 'edit'])->middleware('admin');
Route::patch('/admin/ekstra', [AdminEkstraController::class, 'update'])->middleware('admin');
Route::delete('/admin/ekstra', [AdminEkstraController::class, 'delete'])->middleware('admin');

//Fasilitas
Route::get('/admin/fasilitas', [AdminFasilitasController::class, 'index'])->middleware('admin');
Route::get('/admin/fasilitas/create', [AdminFasilitasController::class, 'create'])->middleware('admin');
Route::post('/admin/fasilitas', [AdminFasilitasController::class, 'store'])->middleware('admin');
Route::get('/admin/fasilitas/{id}/edit', [AdminFasilitasController::class, 'edit'])->middleware('admin');
Route::patch('/admin/fasilitas', [AdminFasilitasController::class, 'update'])->middleware('admin');
Route::delete('/admin/fasilitas', [AdminFasilitasController::class, 'delete'])->middleware('admin');

//Voucher
Route::get('/admin/voucher', [AdminVoucherController::class, 'index'])->middleware('admin');
Route::get('/admin/voucher/create', [AdminVoucherController::class, 'create'])->middleware('admin');
Route::post('/admin/voucher', [AdminVoucherController::class, 'store'])->middleware('admin');
Route::get('/admin/voucher/{id}/edit', [AdminVoucherController::class, 'edit'])->middleware('admin');
Route::patch('/admin/voucher', [AdminVoucherController::class, 'update'])->middleware('admin');
Route::delete('/admin/voucher', [AdminVoucherController::class, 'delete'])->middleware('admin');

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