<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

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

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'loginindex'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerindex'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgot-password', [AuthController::class, 'forgotpasswordindex'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot-password');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetpasswordindex'])->name('reset-password');
    Route::post('/reset-password', [AuthController::class, 'resetpassword'])->name('reset-password');
});

Route::get('/courses', [CourseController::class, 'courselist'])->name('courses');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
