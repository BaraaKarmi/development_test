<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/orders/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'showByID'])->name('order.get');
Route::get('/orders/user/{user}', [App\Http\Controllers\OrderController::class, 'showByUser'])->name('order.getbyuser');
Route::post('/orders/store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
Route::get('/orders/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
Route::patch('/orders/update', [App\Http\Controllers\OrderController::class, 'update'])->name('order.update');
Route::post('/users/register', [App\Http\Controllers\UserController::class, 'register'])->name('user.register')->middleware('guest');
Route::post('/users/login', [App\Http\Controllers\UserController::class, 'login'])->name('user.login')->middleware('guest');


