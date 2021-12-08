<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;



Route::get('/', [HomeController::class, 'Homepage'])->name('homepage');


Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/property/single/{property}/show', [PropertyController::class, 'show'])->name('property.single.show');




require __DIR__.'/auth.php';
