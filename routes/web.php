<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::post('/', [BookController::class, 'store'])->name('book.store');
Route::patch('/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/{book}', [BookController::class, 'destroy'])->name('book.destroy');
