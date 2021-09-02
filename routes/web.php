<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorsController;

Route::get('/index', [DonorsController::class, 'index']);
Route::post('/create', [DonorsController::class, 'save'])->name('saveDonors');
