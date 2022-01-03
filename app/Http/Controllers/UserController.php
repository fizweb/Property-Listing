<?php

namespace App\Http\Controllers;

use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::latest()->paginate(10);

    return view('admin.user.index', [
      'users' => $users,
    ]);
  }


  /**
   * Show the form for creating a new resource.
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.user.new');
  }


  /**
   * Store a newly created resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make( $request->all(), [
      'name'      => [ 'required', 'string', 'max:191' ],
      'email'     => [ 'required', 'string', 'email:rfc,dns', 'max:191', 'unique:users,email' ],
      'password'  => [ 'required', 'string', 'min:2', 'max:2', 'confirmed' ],
    ], [
      //'content.min' => 'This page needed something to write.',
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();


    $newUserData = [
      'name'      => $request->name,
      'email'     => $request->email,
      'password'  => $request->password,
    ];
    
    $userCreated = User::create( $newUserData );

    Flasher::addSuccess("New user for ($request->name) created successfully!");

    return back();
  }


  /**
   * Display the specified resource.
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::find($id);

    if( ! $user ) Flasher::addError("The user not found!"); return back();

    return view('admin.user.edit', [
      'user' => $user,
    ]);
  }


  /**
   * Update the specified resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user = User::find($id);

    if( ! $user ) Flasher::addError("The user not found!"); return back();

    $validator = Validator::make( $request->all(), [
      'name'      => [ 'required', 'string', 'max:191' ],
      'email'     => [ 'required', 'string', 'email:rfc,dns', 'max:191', "unique:users,email,$id" ],
      'password'  => [ 'nullable', 'string', 'min:2', 'max:2', 'confirmed' ],
    ], [
      //'content.min' => 'This page needed something to write.',
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();


    $editUserData = [
      'name'      => $request->name,
      'email'     => $request->email,
      'password'  => $request->password ?? $user->password,
    ];
    
    $userUpdated = $user->update( $editUserData );

    Flasher::addSuccess("The user for ($user->name) updated successfully!");

    return redirect()->route('dashboard-user.index');
  }


  /**
   * Remove the specified resource from storage.
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy( $id )
  {
    $user = User::find($id);

    if( ! $user ) Flasher::addError("The user not found!"); return back();

    $user->delete();

    Flasher::addSuccess("The user ($user->name) deleted successfully!");

    return back();
  }

}
