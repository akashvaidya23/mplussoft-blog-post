<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user',App\Http\Controllers\UserController::class);
Route::get('login',[App\Http\Controllers\UserController::class,'login_view']);
Route::post('login',[App\Http\Controllers\UserController::class,'login']);
Route::get('dashboard',[App\Http\Controllers\UserController::class,'dashboard']);
Route::get('logout',[App\Http\Controllers\UserController::class,'logout']);

Route::resource('blog',App\Http\Controllers\BlogController::class);
// Route::resource('user',App\Http\Controllers\UserController::class);