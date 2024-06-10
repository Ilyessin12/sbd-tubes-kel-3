<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Bagian Controller Frontend
use App\Http\Controllers\Frontend\HomeController;

//Bagian Controller Admin
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
|
*/

/*
Route::get('/', function () {
    return view('frontend.welcome');
});
*/

//Routing untuk Bagian Frontend
Route::get('/', [HomeController::class, 'index']);

//Routing untuk Bagian Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin');
//untuk redirect ke dashboard jika ada yang mengetik "/admin" di url
Route::redirect('/admin', '/admin/dashboard');

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
*/