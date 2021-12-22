<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   */
  public function index( Request $request )
  {
    $search_by     = $request->search_by ?? null;
    $price         = $request->price ?? [];
    $location      = $request->location ?? null;
    $bedrooms      = $request->bedrooms ?? null;
    $property_type = $request->property_type ?? null;
    $dealings_type = $request->dealings_type ?? null;

    /* if( ! empty($price) ){
      $price = explode('-', $price);
      $price = $price[1] != '+' ? $price : [$price[0]];
    } */
    
    // $properties = Property::get()->all();
    // $properties = Property::orderBy('created_at', 'desc')->limit(3)->get();
    // $properties = Property::orderByDesc('created_at')->limit(3)->get()->all();

    // Paginate
    // $properties = Property::latest()->where('property_type', $property_type)->paginate(9);

    $properties = Property::latest();

    $locations = Location::get(['id', 'name'])->all();
    
    if( ! empty($dealings_type) ){
      $properties = $properties->where('dealings_type', $dealings_type);
    }

    if( ! empty($property_type) ){
      $properties = $properties->where('property_type', $property_type);
    }
    
    if( ! empty($location) ){
      $properties = $properties->where('location_id', $location);
    }
    
    if( ! empty($price) ){
      $price = explode('-', $price);
      $price = $price[1] != '+' ? $price : [$price[0]];

      $properties = count($price) == 2 ?
                                        $properties->where('price', '>=', $price[0])
                                                   ->where('price', '<=', $price[1]) :
                                        $properties->where('price', '>=', $price[0]);
    }

    if( ! empty($bedrooms) ){
      $properties = $properties->where('bedrooms', '>=', $bedrooms);
    }

    if( ! empty($search_by) ){
      $searchColumns  = [ 'title', 'feature_type', 'overview' ];
      
      $properties = $properties->where( function($q) use( $searchColumns, $search_by ){
        foreach( $searchColumns as $column )
          $q->orWhere( $column, 'like', "%{$search_by}%" );
      });
    }

    $properties = $properties->paginate(9);

    return view('property.index', [
      'properties'    => $properties,
      'locations'     => $locations,
    ]);
  }


  /**
   * Show the form for creating a new resource.
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }


  /**
   * Store a newly created resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }


  /**
   * Display the specified resource.
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function show( Property $property )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }

    return view('property.single', [
      'property' => $property,
    ]);
  }


  /**
   * Show the form for editing the specified resource.
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function edit(Property $property)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   * @param  \App\Models\Property  $property
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Property $property, Request $request)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function destroy(Property $property)
  {
    //
  }



}
