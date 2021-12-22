<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;



Route::get('/', [HomeController::class, 'Homepage'])->name('homepage');


Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Database/Migration Table programmatically by using Artisan::call()
Route::get('/migration-update', [HomeController::class, 'DatabaseTableUpdate'])->name('database.migration.update');
Route::get('/migration-fresh', [HomeController::class, 'DatabaseTableFresh'])->name('database.migration.fresh');
Route::get('/migration-fresh-seed', [HomeController::class, 'DatabaseTableFreshSeed'])->name('database.migration.fresh.seed');
Route::get('/migration-rollback', [HomeController::class, 'DatabaseTableRollback'])->name('database.migration.rollback');
Route::get('/db-seed', [HomeController::class, 'DatabaseSeed'])->name('database.seed');



Route::get('/properties', [PropertyController::class, 'index'])->name('property.all.index');
Route::get('/property/single/{property}/show', [PropertyController::class, 'show'])->name('property.single.show');



Route::get('/page/{slug}', [PageController::class, 'single'])->name('page.single');




require __DIR__.'/auth.php';
