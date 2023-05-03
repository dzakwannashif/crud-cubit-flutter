<?php

use App\Http\Controllers\Controller\MainController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index']);
Route::post('/create', [MainController::class, 'store']);
Route::post('/update{id}', [MainController::class, 'update']);
Route::delete('/delete{id}', [MainController::class, 'destroy']);
