<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/fakultas', [FakultasController::class, 'index']);
route::get('/prodi', action: [ProdiController::class, 'index']);
route::get('/mahasiswa', [MahasiswaController::class, 'index']);

route::post('/fakultas', action: [FakultasController::class, 'store']);
route::post('/prodi', action: [ProdiController::class, 'store']);
route::post('/mahasiswa', action: [MahasiswaController::class, 'store']);

route::patch('/fakultas/{fakultas}', [FakultasController::class, 'update']);
route::patch('/prodi/{prodi}', [ProdiController::class, 'update']);
route::patch('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update']);

route::delete('/fakultas/{fakultas}', [FakultasController::class, 'destroy']);
route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy']);
route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy']);
