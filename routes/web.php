<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Start Admins Routes

Route::middleware(['auth' , 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
    Route::view('/dashboard', 'admins.dashboard')->name('admins.dashboard');
    Route::get('/logout', [AdminController::class , 'logout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/', AdminController::class);


});




// End Admins Routes



// Start Owners Routes

Route::middleware(['auth' , 'role:owner'])->group(function () {
    Route::view('/owners/dashboard', 'owners.dashboard')->name('owners.dashboard');
    Route::resource('owners', AdminController::class);
});


// End Owners Routes


// Start Accountants Routes

Route::middleware(['auth' , 'role:accountant'])->group(function () {
    Route::view('/accountants/dashboard', 'accountants.dashboard')->name('accountants.dashboard');
    Route::resource('accountants', AdminController::class);
});




// End Accountants Routes


// Start Suppliers Routes

Route::middleware(['auth' , 'role:supplier'])->group(function () {
    Route::view('/suppliers/dashboard', 'suppliers.dashboard')->name('suppliers.dashboard');
    Route::resource('suppliers', AdminController::class);
});

// End suppliers Routes


// Start Custosmers Routes

Route::middleware(['auth'])->group(function () {
    Route::view('/custosmers/dashboard', 'custosmers.dashboard')->name('custosmers.dashboard');
    Route::resource('custosmers', AdminController::class);
});

// End Custosmers Routes









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';