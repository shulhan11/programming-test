<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Landing-Page.index', [
        'title' => 'Departement Produksi'
    ]);
});



Route::get('/home', [HomeController::class, 'index']);
Route::get('/detail', [HomeController::class, 'show']);
Route::resource('/transaksi', TransaksiController::class);
