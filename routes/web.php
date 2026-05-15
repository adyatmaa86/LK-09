<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return redirect()->route('buku.index');
});

Route::post('buku/search', [BukuController::class, 'search'])->name('buku.do-search');
Route::get('buku/clear-search', [BukuController::class, 'clearSearch'])->name('buku.clear-search');
Route::resource('buku', BukuController::class);
