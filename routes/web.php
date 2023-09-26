<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'index']) -> name('dashboard');

Route::get('/project', [ProjectController::class, 'index']) -> name('project');
Route::get('/contact', [ContactController::class, 'index']) -> name('contact');
Route::get('/profile', [UserController::class, 'index']) -> name('profile');

Route::resource('siswa', SiswaController::class);