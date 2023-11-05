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
        Route::middleware('guest:user')->group(function () {
            Route::view('/user/login', 'auth.admin.login')->name('login');
            Route::view('user/login', 'auth.web.login')->name('login');
            Route::post('/user/login', [\App\Http\Controllers\web\AuthController::class, 'login']);
            Route::get('user/register', [\App\Http\Controllers\web\AuthController::class, 'showRegisterForm'])->name('register.form');
            Route::post('/register', [\App\Http\Controllers\web\AuthController::class, 'register'])->name('register');
        });
        Route::middleware('auth:user')->group(function () {
            Route::get('/user/logout', [\App\Http\Controllers\web\AuthController::class, 'logout'])->name('logout');
            // Route::get('/web/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/',[\App\Http\Controllers\web\HomeController::class, 'index'])->name('home');

            Route::prefix('web')->name('feedback.')->group(function(){
                Route::get('/feedback/create' , [\App\Http\Controllers\web\FeedbackController::class ,'create'])->name('create');     
                Route::post('/feedback/create' , [\App\Http\Controllers\web\FeedbackController::class ,'store'])->name('create');     
                Route::get('/feedback/detail/{feedback}' , [\App\Http\Controllers\web\FeedbackController::class ,'detail'])->name('detail');

                Route::prefix('/feedback/detail/{feedback}')->name('comment.')->group(function(){
                    Route::get('/create' , [\App\Http\Controllers\web\CommentController::class ,'create'])->name('create');
                    Route::post('/create' , [\App\Http\Controllers\web\CommentController::class ,'store'])->name('create');
                });  


            });


        });
    }
);
