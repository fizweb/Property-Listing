<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
  public function show(Property $property)
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }

    return view('property.single')->with([
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
