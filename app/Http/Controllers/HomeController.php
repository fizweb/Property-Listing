<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class HomeController extends Controller
{
  public function Homepage()
  {
    // $properties = Property::get()->all();
    // $properties = Property::orderBy('created_at', 'desc')->limit(3)->get()->all();
    // $properties = Property::orderByDesc('created_at')->limit(3)->get()->all();
    $properties = Property::latest()->get()->take(4);
    
    return view('welcome')->with([
      'properties' => $properties,
    ]);
  }


  // Database/Migration Table Update by Artisan Command
  public function DatabaseTableUpdate()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate', []);

    return redirect()->route('homepage')->with('success', 'Migration updated successfully!');
  }
    

  // Database/Migration Table Fresh by Artisan Command
  public function DatabaseTableFresh()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate:fresh', []);

    return redirect()->route('homepage')->with('success', 'Migration successfully!');
  }
    

  // Database/Migration Table Fresh by Artisan Command
  public function DatabaseTableFreshSeed()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate:fresh --seed', []);

    return redirect()->route('homepage')->with('success', 'Migration with dummy data successfully done!');
  }
  

  // Database/Migration Table Rollback by Artisan Command
  public function DatabaseTableRollback()
  {
    // Call Artisan Command in Controller
    Artisan::call('migrate:rollback', []);

    return redirect()->route('homepage')->with('success', 'Migration rollbacked successfully!');
  }
  

  // DB/Seed by Artisan Command
  public function DatabaseSeed()
  {
    // Call Artisan Command in Controller
    Artisan::call('db:seed', []);

    return redirect()->route('homepage')->with('success', 'Dummy data inserted successfully!');
  }



}
