<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware'=> 'guest'], function(){
    Route::get('/login', [AuthController::class, 'loginindex'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'registerindex'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('register');
});

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
