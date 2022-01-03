<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
  // New Location Form
  public function create()
  {
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.location.new', [
      'locations' => $locations,
    ]);
  }


  // Store New Location
  public function store( Request $request )
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

    Flasher::addSuccess("New location added successfully!");

    return back();
  }

  
  // Edit Location Form
  public function edit( Location $location )
  {
    if( ! $location ) Flasher::addError("The location not found!"); return back();

    return view('admin.location.edit', [
      'location' => $location,
    ]);
  }


  // Update Location
  public function update( Location $location, Request $request )
  {
    if( ! $location ) Flasher::addError("The location not found!"); return back();

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

    Flasher::addSuccess("The location ($location->name) updated successfully!");

    return redirect()->route('admin.location.new');
  }


  public function destroy( Location $location, Request $request )
  {
    if( ! $location ) Flasher::addError("The location not found!"); return back();

    foreach( $location->properties as $property ){
      $property->update([ 'location_id' => null ]);
    }

    $location->delete();

    Flasher::addSuccess("The location ($location->name) deleted successfully!");

    return back();
  }



}
