<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/fakultas', [FakultasController::class, 'index']);
route::get('/prodi', action: [ProdiController::class, 'index']);

Route::post('/fakultas', action: [FakultasController::class, 'store']);
route::post('/prodi', action: [ProdiController::class, 'store']);
route::post('/mahasiswa', action: [ProdiController::class, 'store']);
