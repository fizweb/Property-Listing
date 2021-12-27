<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use League\CommonMark\Extension\SmartPunct\DashParser;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// Database/Migration Table programmatically by using Artisan::call()
Route::get('/migration-update', [HomeController::class, 'DatabaseTableUpdate'])->name('database.migration.update');
Route::get('/migration-fresh', [HomeController::class, 'DatabaseTableFresh'])->name('database.migration.fresh');
Route::get('/migration-fresh-seed', [HomeController::class, 'DatabaseTableFreshSeed'])->name('database.migration.fresh.seed');
Route::get('/migration-rollback', [HomeController::class, 'DatabaseTableRollback'])->name('database.migration.rollback');
Route::get('/db-seed', [HomeController::class, 'DatabaseSeed'])->name('database.seed');



/** LOCALIZED ROUTES GROUP **/
Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
  
  Route::get('/', [HomeController::class, 'Homepage'])->name('homepage');

  Route::get('/properties', [PropertyController::class, 'index'])->name('property.all.index');
  Route::get('/property/single/{property}/show', [PropertyController::class, 'show'])->name('property.single.show');
  Route::post('/property-inquiry/{property}', [ContactController::class, 'propertyInquiry'])->name('property.single.inquiry');

  
  Route::get('/page/{slug}', [PageController::class, 'single'])->name('page.single');

});



// ADMIN ROUTES
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'admin'], function(){
  Route::get('/dashboard', [DashboardController::class, 'DashboardIndex'])->name('admin.dashboard');
  Route::get('/properties', [DashboardController::class, 'PropertiesAll'])->name('admin.property.index');
  Route::get('/property/add-new', [DashboardController::class, 'PropertyNewForm'])->name('admin.property.new');
  Route::post('/property/add-new', [DashboardController::class, 'PropertyNewStore'])->name('admin.property.new');
  Route::get('/property/{property}/edit', [DashboardController::class, 'PropertySingleEdit'])->name('admin.property.edit');
  Route::post('/property/{property}/edit', [DashboardController::class, 'PropertySingleUpdate'])->name('admin.property.edit');
  Route::get('/property/{property}/delete', [DashboardController::class, 'PropertySingleDelete'])->name('admin.property.delete');
  
});




require __DIR__.'/auth.php';
