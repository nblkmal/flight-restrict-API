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
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/API-token', [App\Http\Controllers\TokenController::class, 'index'])->name('api:token');
Route::get('/API-docs', [App\Http\Controllers\DocumentationController::class, 'index'])->name('api:docs');
Route::get('/donate', [App\Http\Controllers\DonateController::class, 'index'])->name('donate:index');
Route::post('/donate/store', [App\Http\Controllers\DonateController::class, 'store'])->name('donate:store');