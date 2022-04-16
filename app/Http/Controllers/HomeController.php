<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Location;
use App\Models\Property;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
  public function Homepage()
  {
    // $properties = Property::get()->all();
    // $properties = Property::orderBy('created_at', 'desc')->limit(3)->get()->all();
    // $properties = Property::orderByDesc('created_at')->limit(3)->get()->all();
    $properties = Property::latest()->get()->take(4);

    $locations = Location::orderBy('name', 'asc')->get(['id', 'name'])->all();
    
    return view('welcome', [
      'properties' => $properties,
      'locations'  => $locations,
    ]);
  }


  // Show Single Static Page
  public function SinglePage( $slug )
  {
    $page = Page::where('slug', $slug)->first();

    if( ! $page ) return back()->with("The ($slug) page not found!");

    return view('pages.single', [
      'page' => $page,
    ]);
  }


  // Change Currency
  public function CurrencyChange( $code )
  {
    Cookie::queue('currency', $code, 3600);

    return back();
  }


  // Create-Symbolic-Link
  public function CreateSymbolicLink()
  {
    $target_folder = '/home/rangsapp/public_html/public/assets';
    $link_folder   = '/home/rangsapp/public_html/assets';

    symlink( $target_folder, $link_folder );

    Flasher::addSuccess("Symbolic-Link created successfully!");

    return redirect()->route('homepage');
  }
  
  
  // Create-Laravel-Storage-Link
  public function CreateStorageLink()
  {
    // Call Artisan Command in Controller
    Artisan::call('storage:link', []);

    Flasher::addSuccess("Storage-link created successfully!");

    return redirect()->route('homepage');
  }


  // Database/Migration Table Update by Artisan Command
  public function DatabaseTableUpdate()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate', []);

    Flasher::addSuccess("Migration updated successfully!");

    return redirect()->route('homepage');
  }
    

  // Database/Migration Table Fresh by Artisan Command
  public function DatabaseTableFresh()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate:fresh', []);

    Flasher::addSuccess("Migration successfully!");

    return redirect()->route('homepage');
  }
    

  // Database/Migration Table Fresh by Artisan Command
  public function DatabaseTableFreshSeed()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate:fresh --seed', []);

    Flasher::addSuccess("Migration with dummy data successfully done!");

    return redirect()->route('homepage');
  }
  

  // Database/Migration Table Rollback by Artisan Command
  public function DatabaseTableRollback()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate:rollback', []);

    Flasher::addSuccess("Migration rollbacked successfully!");

    return redirect()->route('homepage');
  }
  

  // DB/Seed by Artisan Command
  public function DatabaseSeed()
  {
    // Call Artisan Command in Controller
    Artisan::call('db:seed', []);

    Flasher::addSuccess("Dummy data inserted successfully!");

    return redirect()->route('homepage');
  }
    
   
    // clear-view by Artisan Command
  public function ViewClear()
  {
    // Call Artisan Command in Controller
    Artisan::call('view:clear', []);

    return redirect()->route('homepage')->with('success', 'View cleared successfully!');
  }
  

  // clear-route by Artisan Command
  public function RouteClear()
  {
    // Call Artisan Command in Controller
    Artisan::call('route:clear', []);

    return redirect()->route('homepage')->with('success', 'Route cleared successfully!');
  }
  

  // clear-cache by Artisan Command
  public function CacheClear()
  {
    // Call Artisan Command in Controller
    Artisan::call('cache:clear', []);

    return redirect()->route('homepage')->with('success', 'Cache cleared successfully!');
  }
  

  // clear-config by Artisan Command
  public function ConfigClear()
  {
    // Call Artisan Command in Controller
    Artisan::call('config:clear', []);

    return redirect()->route('homepage')->with('success', 'Config cleared successfully!');
  }
  

  // cache-config by Artisan Command
  public function ConfigCache()
  {
    // Call Artisan Command in Controller
    Artisan::call('config:cache', []);

    return redirect()->route('homepage')->with('success', 'Config cached successfully!');
  }
  
  


}
