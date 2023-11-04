<?php

use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return redirect()->route('admin.login');
// });

Route::name('web.')->group(
    function () {
        Route::middleware('guest:web')->group(function () {
            Route::view('/web', 'auth.admin.login')->name('login');
            Route::view('/login', 'auth.web.login')->name('web.login');
            Route::post('/web/login', [\App\Http\Controllers\web\AuthController::class, 'login']);
            Route::get('/register', [\App\Http\Controllers\web\AuthController::class, 'showRegisterForm'])->name('register.form');
            Route::post('/register', [\App\Http\Controllers\web\AuthController::class, 'register'])->name('register');
        });
        Route::middleware('auth')->group(function () {
            Route::post('/web/logout', [AuthController::class, 'logout'])->name('logout');
            // Route::get('/web/dashboard', [DashboardController::class, 'index'])->name('dashboard');


            Route::get('/' ,[HomeController::class , 'index'])->name('home');       
        });
    }
);
