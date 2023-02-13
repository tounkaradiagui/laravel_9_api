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

Route::get( 'etudiant', [EtudiantController::class, 'index']);
Route::post( 'etudiant', [EtudiantController::class, 'store']);
Route::get( 'etudiant/{id}', [EtudiantController::class, 'show']);
Route::get( 'etudiant/edit/{id}', [EtudiantController::class, 'edit']);
Route::put( 'etudiant/edit/{id}', [EtudiantController::class, 'update']);
Route::delete( 'etudiant/delete/{id}', [EtudiantController::class, 'destroy']);
