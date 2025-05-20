<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;

Route::get('/', [AutorController::class, 'index'])->name('autores.index');
Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
Route::get('/create', [AutorController::class, 'create'])->name('create');
Route::post('/store', [AutorController::class, 'store'])->name('store');
Route::get('/show/{codigo_autor}', [AutorController::class, 'show'])->name('show');
Route::get('/edit/{codigo_autor}', [AutorController::class, 'edit'])->name('edit');
Route::put('/update/{codigo_autor}', [AutorController::class, 'update'])->name('update');
Route::delete('/destroy/{codigo_autor}', [AutorController::class, 'destroy'])->name('destroy');