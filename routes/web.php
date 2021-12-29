<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use League\CommonMark\Extension\SmartPunct\DashParser;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// Symbolic-Link & Laravel-Storage-Link
Route::get('/symlink', [HomeController::class, 'CreateSymbolicLink']);
Route::get('/storage-link', [HomeController::class, 'CreateStorageLink']);

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



/** ADMIN ROUTES - ADMIN ROUTES - ADMIN ROUTES **/
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'admin'], function(){
  Route::get('/dashboard', [DashboardController::class, 'DashboardIndex'])->name('admin.dashboard');
  Route::get('/properties', [PropertyController::class, 'admin_index'])->name('admin.property.index');
  Route::get('/property/add-new', [PropertyController::class, 'create'])->name('admin.property.new');
  Route::post('/property/add-new', [PropertyController::class, 'store'])->name('admin.property.new');
  Route::get('/property/{property}/edit', [PropertyController::class, 'edit'])->name('admin.property.edit');
  Route::post('/property/{property}/edit', [PropertyController::class, 'update'])->name('admin.property.edit');
  Route::get('/property/{property}/delete', [PropertyController::class, 'destroy'])->name('admin.property.delete');
  
  Route::get('/property/{property_id}/featured-image/delete', [PropertyController::class, 'Delete_Featured_Media'])->name('admin.property.featured-Media.delete');
  Route::get('/property/gallery/{gallery_id}/{property_id}/{media_id}/delete', [PropertyController::class, 'Delete_Property_Gallery'])->name('admin.property.gallery.delete');
  
  Route::get('/location/add-new', [LocationController::class, 'create'])->name('admin.location.new');
  Route::post('/location/add-new', [LocationController::class, 'store'])->name('admin.location.new');
  Route::get('/location/{location}/edit', [LocationController::class, 'edit'])->name('admin.location.edit');
  Route::post('/location/{location}/edit', [LocationController::class, 'update'])->name('admin.location.edit');
  Route::get('/location/{location}/delete', [LocationController::class, 'destroy'])->name('admin.location.delete');

});




require __DIR__.'/auth.php';
