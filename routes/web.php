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

// User Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showUserLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showUserRegister'])->name('register');
    Route::post('/login', [AuthController::class, 'processUserLogin']);
    Route::post('/register', [AuthController::class, 'processUserRegister']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'showUserProfile']);
    Route::post('/update', [AuthController::class, 'updateUserProfile']);
    Route::post('/updatePassword', [AuthController::class, 'updateUserPassword']);
    Route::get('/', [AuthController::class, 'showUserDashboard']);
    Route::get('/logout', [AuthController::class, 'userLogout']);
});



// Admin Routes
Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'processAdminLogin']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/logout', [AuthController::class, 'adminLogout']);
    Route::get('/admin', [AuthController::class, 'showAdminDashboard']);
    Route::get('/admin/profile', [AuthController::class, 'showAdminProfile']);
    Route::post('/admin/update', [AuthController::class, 'updateAdminProfile']);
    Route::post('/admin/updatePassword', [AuthController::class, 'updateAdminPassword']);
});
