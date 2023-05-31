<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CustomerController::class, 'index'])->name('users.index');
Route::get('/create', [CustomerController::class, 'create'])->name('users.create');
Route::post('/create', [CustomerController::class, 'store'])->name('users.store');
Route::delete('/delete/{customer}', [CustomerController::class, 'destroy'])->name('users.destroy');