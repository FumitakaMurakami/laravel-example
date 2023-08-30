<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TimelineController;
use App\Http\Controllers\LoginController;

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

Route::get(
    '/Timeline',
    [TimelineController::class, 'index']
)->name('timeline');

Route::post(
    '/registerTimeline',
    [TimelineController::class, 'registerTimeline']
)->name('registerTimeline');

Route::get(
    '/',
    [LoginController::class, 'index']
)->name('index');

Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('login');
