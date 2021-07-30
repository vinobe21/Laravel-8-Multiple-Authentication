<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::view('/', 'auth.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin route
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','preventBackHistory']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

//User route
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','preventBackHistory']], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
});