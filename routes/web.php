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

use App\Http\Controllers\CasillaController;
use App\Http\Controllers\Api\CandidatoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EleccioncomiteController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('casilla', CasillaController::class);
Route::resource('candidato', CandidatoController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::resource('eleccioncomite', EleccioncomiteController::class);