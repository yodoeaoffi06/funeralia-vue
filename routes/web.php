<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/create-client', [ServicesController::class, 'createClient'])->name('create-client');
Route::post('/create-service', [ServicesController::class, 'createService'])->name('create-service');
Route::post('/generate-mobilary', [ServicesController::class, 'generateMobilary'])->name('generate-mobilary');
Route::get('/get-mobilary/{id_tipo_servicio}', [ServicesController::class, 'getMobilary']);

Route::get('/reg1', [RegisterController::class, 'showReg1'])->name('reg1');
Route::get('/reg2/{id_cliente}', function ($id_cliente) {
    return view('reg2', compact('id_cliente'));
})->name('reg2');
Route::get('/reg3/{id_servicio}/{id_tipo_servicio}', function ($id_servicio, $id_tipo_servicio) {
    return view('reg3', compact('id_servicio', 'id_tipo_servicio'));
})->name('reg3');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');



