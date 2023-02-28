<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EtudiantController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get( 'students', [EtudiantController::class, 'index']);
Route::post( 'students', [EtudiantController::class, 'store']);
Route::get( 'students/{id}', [EtudiantController::class, 'show']);
Route::get( 'students/edit/{id}', [EtudiantController::class, 'edit']);
Route::put( 'students/edit/{id}', [EtudiantController::class, 'update']);
Route::delete( 'students/delete/{id}', [EtudiantController::class, 'destroy']);
