<?php

use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaskController;
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

Route::name('admin.')->group(
    function () {
        Route::middleware('guest:admin')->group(function () {
            Route::view('/admin', 'auth.admin.login')->name('login');
            Route::view('/admin/login', 'auth.admin.login')->name('login');
            Route::post('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
        });
        Route::middleware('auth:admin')->group(function () {
            Route::post('/admin/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
            Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
            /**
             * Users Routes
             */
            Route::prefix('admin')->group(function(){
                Route::get('/users', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');
                Route::delete('/user/delete/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('user.delete');
                /**
                 * Feedbacks Routes
                */
                Route::get('/feedbacks' , [\App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedbacks');
                Route::get('/feedback/detail/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'detail'])->name('feedback.detail');
                Route::post('/feedback/activate/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'activate'])->name('feedback.activate');
                Route::post('/feedback/inactivate/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'inactivate'])->name('feedback.inactivate');
                Route::delete('/feedback/delete/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'delete'])->name('feedback.delete');
            }); 
        });
    }
);