<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
  // Add New Location Form
  public function LocationNewForm( Request $request )
  {
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.location.new', [
      'locations' => $locations,
    ]);
  }


  // Store New Location
  public function LocationNewStore( Request $request )
  {
    $validator = Validator::make( $request->all(), [
      'name'  => [ 'required', 'string', 'max:191' ],
      'city'  => [ 'required', 'string', 'max:191' ],
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();
    

    // Get & Set new property data
    $newLocationData = [
      'name'  => $request->name,
      'city'  => $request->city,
    ];
    
    $locationCreated = Location::create( $newLocationData );

    return back()->with('success', 'New location added successfully!');
  }

  
  // Edit Location Form
  public function LocationSingleEdit( Location $location, Request $request )
  {
    if( ! $location ){
      return back()->with('error', 'The location not found!');
    }

    return view('admin.location.edit');
  }


  // Store New Location
  public function LocationSingleUpdate( Location $location, Request $request )
  {
    if( ! $location ){
      return back()->with('error', 'The location not found!');
    }

    $validator = Validator::make( $request->all(), [
      'name'  => [ 'required', 'string', 'max:191' ],
      'city'  => [ 'required', 'string', 'max:191' ],
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();
    

    // Get & Set new property data
    $locationUpdateData = [
      'name'  => $request->name,
      'city'  => $request->city,
    ];
    
    $locationUpdated = $location->update( $locationUpdateData );

    return redirect()->route('admin.location.new')
      ->with('success', "The location \"$location->name\" updated successfully!");
  }



}
