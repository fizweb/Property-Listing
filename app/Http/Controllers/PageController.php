<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pages = Page::latest()->paginate(10);

    return view('admin.page.index', [
      'pages' => $pages,
    ]);
  }


  /**
   * Show the form for creating a new resource.
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.page.new');
  }


  /**
   * Store a newly created resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make( $request->all(), [
      'title'   => [ 'required', 'string', 'max:191', 'unique:pages,title' ],
      'content' => [ 'required', 'string', 'min:100', 'max:10000' ],
    ], [
      //'content.min' => 'This page needed something to write.',
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();


    $newPageData = [
      'title'   => $request->title,
      'slug'    => Str::slug($request->title),
      'content' => $request->content,
    ];
    
    $pageCreated = Page::create( $newPageData );

    Flasher::addSuccess("New ($request->title) page added successfully!");

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
    $page = Page::find($id);

    if( ! $page ) Flasher::addError("The page not found!"); return back();

    return view('admin.page.edit', [
      'page' => $page,
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
    $page = Page::find($id);

    if( ! $page ) Flasher::addError("The page not found!"); return back();

    $validator = Validator::make( $request->all(), [
      'title'   => [ 'required', 'string', 'max:191', "unique:pages,title,$id" ],
      'content' => [ 'required', 'string', 'min:100', 'max:10000' ],
    ], [
      //'content.min' => 'This page needed something to write.',
    ]);
    if( $validator->fails() ) return back()->withErrors( $validator )->withInput();


    $updatePageData = [
      'title'   => $request->title,
      'slug'    => Str::slug($request->title),
      'content' => $request->content,
    ];
    
    $pageUpdated = $page->update( $updatePageData );

    Flasher::addSuccess("The ($page->title) page updated successfully!");

    return redirect()->route('dashboard-page.index');
  }


  /**
   * Remove the specified resource from storage.
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy( $id )
  {
    $page = Page::find($id);

    if( ! $page ) Flasher::addError("The page not found!"); return back();

    $page->delete();

    Flasher::addSuccess("The ($page->title) page deleted successfully!");

    return back();
  }
}
