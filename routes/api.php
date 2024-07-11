<?php

use App\Http\Controllers\Api\categoriacontroller;
use App\Http\Controllers\registro;
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
Route::get('/prueba', function () {
    return 'prueba';
});


 Route::post('registro', [registro::class,'store'])->name('api.v1.registro');

 Route::post('categoria', [categoriacontroller::class,'store'])->name('api.v1.categoria');
