<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Halaman Register & proses register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');




// halaman login & proses login
Route::get('', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// fungsi halaman yang bisa diakses ketika sudah login
Route::middleware('auth.custom')->group(function () {

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Hapus User
Route::delete('/users/{id}', [AuthController::class, 'destroy'])->name('users.destroy');

// Edit & proses edit
Route::get('/user/edit/{id}', [AuthController::class, 'editUser'])->name('user.edit');
Route::post('/user/update/{id}', [AuthController::class, 'updateUser'])->name('user.update');

});
