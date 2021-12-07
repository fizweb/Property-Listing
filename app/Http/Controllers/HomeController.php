<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;


class HomeController extends Controller
{
  public function Homepage()
  {
    // $properties = Property::get()->all();
    // $properties = Property::orderBy('created_at', 'desc')->limit(3)->get()->all();
    // $properties = Property::orderByDesc('created_at')->limit(3)->get()->all();
    $properties = Property::latest()->take(4)->get()->all();
    
    return view('welcome')->with([
      'properties' => $properties,
    ]);
  }



}
