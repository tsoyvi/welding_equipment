<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\NTDListController;
use App\Http\Controllers\API\OtuListController;
use App\Http\Controllers\API\RecordController;
use App\Http\Controllers\API\EquipmentListController;

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



Route::get('/otu-list', OtuListController::class);
Route::get('/settings/ntd_list', NTDListController::class);

// Route::apiResource('receipt', ReceiptController::class); //

Route::get('records', [RecordController::class, 'index']);
Route::post('receipt', [RecordController::class, 'store']);
Route::post('record-update', [RecordController::class, 'update']);

Route::post('equipment', [EquipmentListController ::class, 'store']);

// Route::post('request_list_sort', [RequestAttController::class, 'requestAttList']);