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
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EleccioncomiteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\VotocandidatoController;
use App\Http\Controllers\FuncionariocasillaController;
use App\Http\Controllers\ImeiautorizadoController;





Route::get('/', function () {
    return view('welcome');
});
Route::resource('casilla', CasillaController::class);
Route::resource('candidato', CandidatoController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::resource('eleccioncomite', EleccioncomiteController::class);
Route::resource('eleccion', EleccionController::class);
Route::resource('rol', RolController::class);
Route::resource('voto', VotoController::class);
Route::resource('votocandidato', VotocandidatoController::class);
Route::resource('funcionariocasilla', FuncionariocasillaController::class);
Route::resource('imeiautorizado', ImeiautorizadoController::class);


Route::get('casilla/pdf', 'CasillaController@generatepdf')->name('casillas.pdf');
Route::get('candidato/pdf', 'CandidatoController@generatepdf')->name('candidatos.pdf');




