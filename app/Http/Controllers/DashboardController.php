<?php
namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DashboardController extends Controller
{
  // Show Admin Dashboard
  public function DashboardIndex()
  {

    return view('admin.dashboard');
  }


  // Show All Properties
  public function PropertiesAll()
  {
    $properties = Property::latest()->paginate(20);

    return view('admin.property.index', [
      'properties' => $properties,
    ]);
  }


  // Property Add New Form
  public function PropertyNewForm( Request $request )
  {
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.property.new', [
      'locations' => $locations,
    ]);
  }


  // Store New Property
  public function PropertyNewStore( Request $request )
  {
    $validator = Validator::make( $request->all(), [
      'title'         => [ 'required', 'string', 'max:50' ],
      'dealings_type' => [ 'required', 'string', 'in:buy,rent' ],
      'property_type' => [ 'required', 'string', 'in:land,villa,apartment' ],
      'price'         => [ 'required', 'integer', 'max:999999999' ],
      'feature_type'  => [ 'required', 'string', 'max:50' ],
      'bedrooms'      => [ 'required', 'integer', 'max:9999' ],
      'bathrooms'     => [ 'required', 'integer', 'max:9999' ],
      'net_sft'       => [ 'required', 'integer', 'max:9999999' ],
      'gross_sft'     => [ 'required', 'integer', 'max:9999999' ],
      'net_smt'       => [ 'required', 'integer', 'max:9999999' ],
      'gross_smt'     => [ 'required', 'integer', 'max:9999999' ],
      'pool'          => [ 'required', 'string', 'in:public,private,no' ],
      'location_id'   => [ 'required', 'integer', 'exists:locations,id' ],
      'overview'      => [ 'required', 'string', 'max:1000' ],
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();
    /* [
      'name.required'        => 'The parts-name is required.',
      'name.max'             => 'The parts-name must be less than 50 characters.',
      'name.unique'          => 'The parts-name must be unique.',
    ] */

    $why_buy = null;
    $description = null;


    $newPropertyData = [
      'title'           => $request->title,
      'dealings_type'   => $request->dealings_type,
      'property_type'   => $request->property_type,
      'price'           => $request->price,
      'feature_type'    => $request->feature_type,
      'bedrooms'        => $request->bedrooms,
      'bathrooms'       => $request->bathrooms,
      'net_sft'         => $request->net_sft,
      'gross_sft'       => $request->gross_sft,
      'net_smt'         => $request->net_smt,
      'gross_smt'       => $request->gross_smt,
      'pool'            => $request->pool,
      'location_id'     => $request->location_id,
      'overview'        => $request->overview,
      'why_buy'         => $why_buy,
      'description'     => $description,
      'featured_media'  => $request->featured_media,
    ];
    
    $newPropertyAdded = Property::create( $newPropertyData );

    return back()->with('success', 'New property added successfully!');
  }


  // Property Single Show
  public function PropertySingleShow( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }

    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.property.single', [
      'property' => $property,
    ]);
  }


  // Property Edit
  public function PropertySingleEdit( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }
    
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.property.edit', [
      'property' => $property,
    ]);
  }


  // Property Update
  public function PropertySingleUpdate( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }
    
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return redirect()->route('admin.property.index')
      ->with('success', "Property (ID: $property->id) updated successfully!");
  }



}
