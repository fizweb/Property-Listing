<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Property;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{

  public function propertyInquiry( Property $property, Request  $request )
  {
    if( ! $property ){
      return back()->with('error', 'Property not found!');
    }

    $validator = Validator::make( $request->all(), [
      'name'     => [ 'required', 'string', 'max:50' ],
      'email'    => [ 'required', 'string', 'email:rfc,dns', 'max:191' ],
      'phone'    => [ 'required', 'numeric', 'digits:11' ],
      'message'  => [ 'required', 'string', 'max:191' ],
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();
    /* [
      'name.required'        => 'The parts-name is required.',
      'name.max'             => 'The parts-name must be less than 50 characters.',
      'name.unique'          => 'The parts-name must be unique.',
    ] */

    $newContactData = [
      'name'         => $request->name,
      'email'        => $request->email,
      'phone'        => $request->phone,
      'message'      => $request->message,
      'property_id'  => $property->id,
    ];

    $newContactAdded = Contact::create( $newContactData );

    // Send mail to customer
    Mail::send( new ContactMail( $newContactAdded, $property ) );

    return back()->with('success', 'Your inquiry has been submitted successfully!');
  }
  
  
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
   * @param  \App\Models\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function show(Contact $contact)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   * @param  \App\Models\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function edit(Contact $contact)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Contact $contact)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   * @param  \App\Models\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function destroy(Contact $contact)
  {
    //
  }
}
