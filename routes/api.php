<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/getPlaces', [App\Http\Controllers\API\PlaceController::class, 'index']);
    Route::get('/getCoordinates', [App\Http\Controllers\API\CoordinateController::class, 'index']);
    Route::get('/geojson/getCoordinates', [App\Http\Controllers\API\CoordinateController::class, 'geoJson']);
    
});

Route::get('v1/getNotamLocation', [App\Http\Controllers\API\NotamController::class, 'location']);

// --------------- Excel ---------------------------------
Route::get('/places/file-import-export', [App\Http\Controllers\API\PlaceController::class, 'fileImportExport']);
Route::post('/places/file-import', [App\Http\Controllers\API\PlaceController::class, 'fileImport'])->name('file-import');
// Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');