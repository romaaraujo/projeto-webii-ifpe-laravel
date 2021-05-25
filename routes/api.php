<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fileController;

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

Route::put('/criar', [fileController::class, 'criar']);
Route::get('/abrir/{id}', [fileController::class, 'abrir']);
Route::get('/deletar/{id}', [fileController::class, 'deletar']);
Route::put('/atualizar', [fileController::class, 'atualizar']);
