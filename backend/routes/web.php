<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Login & Proses login
Route::get('', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Halaman Register & proses register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Dashboard (hanya bisa diakses jika sudah login)
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth.custom');

// Hapus User
Route::delete('/users/{id}', [AuthController::class, 'destroy'])->name('users.destroy');

// Edit & proses edit
Route::get('/user/edit/{id}', [AuthController::class, 'editUser'])->name('user.edit');
Route::post('/user/update/{id}', [AuthController::class, 'updateUser'])->name('user.update');


//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Route::resource('users', UserController::class)->middleware('auth.custom');

