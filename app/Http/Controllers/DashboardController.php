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
      'title'          => [ 'required', 'string', 'max:191' ],
      'price'          => [ 'required', 'integer', 'max:999999999' ],
      'dealings_type'  => [ 'required', 'string', 'in:buy,rent' ],
      'property_type'  => [ 'required', 'string', 'in:land,villa,apartment' ],
      'gross_smt'      => [ 'required', 'integer', 'max:9999999' ],
      'net_smt'        => [ 'required', 'integer', 'max:9999999' ],
      'location_id'    => [ 'required', 'integer', 'exists:locations,id' ],
      'overview'       => [ 'required', 'string', 'max:1000' ],
      
      'main_feature'   => [ 'nullable', 'string', 'max:50' ],
      'bedrooms'       => [ 'nullable', 'integer', 'max:9999' ],
      'bathrooms'      => [ 'nullable', 'integer', 'max:9999' ],
      'pool'           => [ 'nullable', 'string', 'in:private,public,no' ],
      'why_buy'        => [ 'nullable', 'string', 'max:2000' ],
      'description'    => [ 'nullable', 'string', 'max:5000' ],
      'featured_media' => [ 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024', 'dimensions:max_width=800,max_height=500' ],
    ], [
      'gross_smt.required'   => 'The gross square-meter field is required.',
      'gross_smt.integer'    => 'The gross square-meter should be must integer.',
      'gross_smt.max'        => 'The gross square-meter should be max 9999999.',
      'net_smt.required'     => 'The net square-meter field is required.',
      'net_smt.integer'      => 'The net square-meter should be must integer.',
      'net_smt.max'          => 'The net square-meter should be max 9999999.',
      'location_id.required' => 'The location field is required.',
      'location_id.integer'  => 'The location field is required.',
      'location_id.exists'   => 'The location dose\'nt exists.',
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();
    

    $why_buy        = $request->why_buy ?? null;
    $description    = $request->description ?? null;
    $featured_media = $request->featured_media ?? null;


    $newPropertyData = [
      'title'           => $request->title,
      'price'           => $request->price,
      'dealings_type'   => $request->dealings_type,
      'property_type'   => $request->property_type,
      'main_feature'    => $request->main_feature,
      'bedrooms'        => $request->bedrooms,
      'bathrooms'       => $request->bathrooms,
      'gross_smt'       => $request->gross_smt,
      'net_smt'         => $request->net_smt,
      'pool'            => $request->pool ?? 'no',
      'location_id'     => $request->location_id,
      'overview'        => $request->overview,
      'why_buy'         => $why_buy,
      'description'     => $description,
      'featured_media'  => $featured_media,
    ];
    
    $newPropertyAdded = Property::create( $newPropertyData );

    return back()->with('success', 'New property added successfully!');
  }


  // Property Edit
  public function PropertySingleEdit( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }
    
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.property.edit', [
      'property'  => $property,
      'locations' => $locations,
    ]);
  }


  // Property Update
  public function PropertySingleUpdate( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }
    
    $validator = Validator::make( $request->all(), [
      'title'          => [ 'required', 'string', 'max:191' ],
      'price'          => [ 'required', 'integer', 'max:999999999' ],
      'dealings_type'  => [ 'required', 'string', 'in:buy,rent' ],
      'property_type'  => [ 'required', 'string', 'in:land,villa,apartment' ],
      'gross_smt'      => [ 'required', 'integer', 'max:9999999' ],
      'net_smt'        => [ 'required', 'integer', 'max:9999999' ],
      'location_id'    => [ 'required', 'integer', 'exists:locations,id' ],
      'overview'       => [ 'required', 'string', 'max:1000' ],
      
      'main_feature'   => [ 'nullable', 'string', 'max:50' ],
      'bedrooms'       => [ 'nullable', 'integer', 'max:9999' ],
      'bathrooms'      => [ 'nullable', 'integer', 'max:9999' ],
      'pool'           => [ 'nullable', 'string', 'in:private,public,no' ],
      'why_buy'        => [ 'nullable', 'string', 'max:2000' ],
      'description'    => [ 'nullable', 'string', 'max:5000' ],
      'featured_media' => [ 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024', 'dimensions:max_width=800,max_height=500' ],
    ], [
      'gross_smt.required'   => 'The gross square-meter field is required.',
      'gross_smt.integer'    => 'The gross square-meter should be must integer.',
      'gross_smt.max'        => 'The gross square-meter should be max 9999999.',
      'net_smt.required'     => 'The net square-meter field is required.',
      'net_smt.integer'      => 'The net square-meter should be must integer.',
      'net_smt.max'          => 'The net square-meter should be max 9999999.',
      'location_id.required' => 'The location field is required.',
      'location_id.integer'  => 'The location field is required.',
      'location_id.exists'   => 'The location dose\'nt exists.',
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();
    

    $why_buy        = $request->why_buy ?? null;
    $description    = $request->description ?? null;
    $featured_media = $request->featured_media ?? $property->featured_media;


    $propertyUpdateData = [
      'title'           => $request->title,
      'price'           => $request->price,
      'dealings_type'   => $request->dealings_type,
      'property_type'   => $request->property_type,
      'main_feature'    => $request->main_feature,
      'bedrooms'        => $request->bedrooms,
      'bathrooms'       => $request->bathrooms,
      'gross_smt'       => $request->gross_smt,
      'net_smt'         => $request->net_smt,
      'pool'            => $request->pool ?? 'no',
      'location_id'     => $request->location_id,
      'overview'        => $request->overview,
      'why_buy'         => $why_buy,
      'description'     => $description,
      'featured_media'  => $featured_media,
    ];
    
    $propertyUpdated = $property->update( $propertyUpdateData );

    return redirect()->route('admin.property.index')
      ->with('success', "The property \"$property->title\" updated successfully!");
  }


  // Property Delete
  public function PropertySingleDelete( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }

    $property_title = $property->title;

    $property->delete();

    return back()->with('success', "The property \"$property_title\" deleted successfully!");
  }



}
