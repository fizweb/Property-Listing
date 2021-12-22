<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;


class PageController extends Controller
{
  //
  public function single( $slug )
  {
    $page = Page::where('slug', $slug)->first();

    if( ! $page ){
      return back()->with('error', 'Page not found!');
    }

    return view('pages.single', [
      'page' => $page,
    ]);
  }



}
