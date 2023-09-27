<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

use App\Http\Controllers\Api\BarcodeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/barcode', BarcodeController::class);
Route::get('/barcode/delete/{id}', [BarcodeController::class, 'destroy']);

Route::post('/midtrans-callback', [TransaksiController::class, 'callback']);
