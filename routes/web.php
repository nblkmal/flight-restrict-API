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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/API-token', [App\Http\Controllers\TokenController::class, 'index'])->name('api:token');
Route::get('/API-docs', [App\Http\Controllers\DocumentationController::class, 'index'])->name('api:docs');
Route::get('/places', [App\Http\Controllers\PlaceController::class, 'index'])->name('place:index');
Route::get('/coordinates/geoJsonExport', [App\Http\Controllers\PlaceController::class, 'geoJsonExport'])->name('coordinates:export-geojson');
Route::get('/donate', [App\Http\Controllers\DonateController::class, 'index'])->name('donate:index');
Route::post('/donate/store', [App\Http\Controllers\DonateController::class, 'store'])->name('donate:store');
Route::get('/donate/bank/{donate}', [App\Http\Controllers\DonateController::class, 'bank'])->name('donate:bank');
Route::get('/pay', [App\Http\Controllers\DonateController::class, 'payBank'])->name('donate:pay');
Route::get('/maps', [App\Http\Controllers\MapsController::class, 'index'])->name('map:index');

Route::get('/file-import', [App\Http\Controllers\FileController::class, 'index'])->name('file:import');
Route::post('/file-import/places', [App\Http\Controllers\FileController::class, 'places'])->name('file:import_places');
Route::post('/file-import/coordinates', [App\Http\Controllers\FileController::class, 'coordinates'])->name('file:import_coordinates');
Route::post('/file-import/notam_locations', [App\Http\Controllers\FileController::class, 'notam_locations'])->name('file:import_notam_locations');

Route::post('/file-export/states', [App\Http\Controllers\FileController::class, 'statesExport'])->name('file:export_states');

Route::get('/return-url', [App\Http\Controllers\ReturnController::class, 'index'])->name('return-url');
Route::get('/callback-url', [App\Http\Controllers\CallbackController::class, 'index'])->name('callback-url');