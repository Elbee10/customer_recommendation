<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::view('/index', 'dashboard.index')->name('index');
Route::get('/login',[CustomAuthController::class, 'login'] )->name('login')->middleware('alreadyLogged');
Route::get('/registration', [CustomAuthController::class, 'registration'])->middleware('alreadyLogged');
Route::post('/register-user', [CustomAuthController::class, 'register_user'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'login_user'] )->name('login-user');
Route::get('/dashboard', [ProductsController::class, 'productsDashboard'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
