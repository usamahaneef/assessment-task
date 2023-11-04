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
            }); 
            /**
             * Tasks Routes
             */
            // Route::prefix('admin')->group(function(){
            //     Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
            //     Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
            //     Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
            //     Route::get('/task/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
            //     Route::post('/task/update/{task}', [TaskController::class, 'update'])->name('task.update');
            //     Route::delete('/task/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');

            //     // filter tasks  
            //     Route::get('/task/filter', [TaskController::class, 'filter'])->name('task.filter');
            // });       
        });
    }
);