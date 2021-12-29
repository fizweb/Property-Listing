<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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


  // Show all properties in admin dashboard
  public function admin_index()
  {
    $properties = Property::latest()->paginate(20);

    return view('admin.property.index', [
      'properties' => $properties,
    ]);
  }


  /**
   * Show the form for creating a new resource.
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.property.new', [
      'locations' => $locations,
    ]);
  }


  /**
   * Store a newly created resource in storage.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store( Request $request )
  {
    $validator = Validator::make( $request->all(), [
      'title'            => [ 'required', 'string', 'max:191' ],
      'price'            => [ 'required', 'integer', 'max:999999999' ],
      'dealings_type'    => [ 'required', 'string', 'in:buy,rent' ],
      'property_type'    => [ 'required', 'string', 'in:land,villa,apartment' ],
      'gross_smt'        => [ 'required', 'integer', 'max:9999999' ],
      'net_smt'          => [ 'required', 'integer', 'max:9999999' ],
      'location_id'      => [ 'required', 'integer', 'exists:locations,id' ],
      'overview'         => [ 'required', 'string', 'max:1000' ],
      
      'main_feature'     => [ 'nullable', 'string', 'max:50' ],
      'bedrooms'         => [ 'nullable', 'integer', 'max:9999' ],
      'bathrooms'        => [ 'nullable', 'integer', 'max:9999' ],
      'pool'             => [ 'nullable', 'string', 'in:private,public,no' ],
      'why_buy'          => [ 'nullable', 'string', 'max:2000' ],
      'description'      => [ 'nullable', 'string', 'max:5000' ],
      'featured_media'   => [ 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024', 'dimensions:max_width=1200,max_height=1000' ],
      'gallery_media'    => [ 'nullable' ],
      'gallery_media.*'  => [ 'image', 'mimes:jpg,jpeg,png', 'max:2048', 'dimensions:max_width=2400,max_height=2000' ],
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
    

    $why_buy      = $request->why_buy ?? null;
    $description  = $request->description ?? null;

    // Validate gallery each file
    if( $request->hasfile('gallery_media') ){
      foreach( $request->file('gallery_media') as $key => $file ){
        if( ! $file->isValid() ){
          $file_no = $key + 1;
          return back()->with('error', "The gallery-media no. {$file_no} has not valid.");
        }
      }
    }

    // Upload featured media & save file location
    $featured_media = null;
    if( $request->hasfile('featured_media') ){
      $featured_file = $request->file('featured_media');
      if( ! $featured_file->isValid() ){
        return back()->with('error', 'The featured-media has not valid!');
      }
      /* $table_status = DB::select("show table status like 'properties'");
      $current_id   = $table_status[0]->Auto_increment;
      $filename = 'property--' .$current_id .'__' .$file->getClientOriginalName(); */

      //$name = $file->hashName();
      //$name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
      //$ext = $file->extension();
      //$ext = $file->getClientOriginalExtension();
      //$ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

      $filename = time() . '__' . $featured_file->hashName();
      //$filename = time() . '__' . Str::slug( $name ) . '.' . $ext;
      //$location = $file->storeAs('location', $file-name, 'disk-name');
      $featured_media = $featured_file->storeAs('uploads/property', $filename, 'public');
      //$featured_media = 'storage/' . $upload_media;
    }


    // Get & Set new property data
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
    
    $propertyCreated = Property::create( $newPropertyData );

    if( $request->hasfile('gallery_media') ){
      $gallery_all = [];

      // Upload gallery file & save file location as media
      foreach( $request->file('gallery_media') as $index => $gallery_file ){
        $filename    = time() . '__' . $gallery_file->hashName();
        $extension   = $gallery_file->getClientOriginalExtension();
        $url = $gallery_file->storeAs('uploads/property', $filename, 'public');

        //$url = 'storage/' . $upload_file;
        $gallery_all[] = Media::create([
          'type'         => 'image',
          'filename'     => $filename,
          'extension'    => $extension,
          'storage_type' => 'local',
          'url'          => $url,
        ]);
      }

      // Create gallery with media & property relationship
      foreach( $gallery_all as $media ){
        Gallery::create([
          'media_id'    => $media->id,
          'property_id' => $propertyCreated->id
        ]);
      }
    }

    return back()->with('success', 'New property added successfully!');
  }


  /**
   * Display the specified resource.
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function show( Property $property )
  {
    if( ! $property ){
      return back()->with('error', 'The property not found!');
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
  public function edit( Property $property )
  {
    if( ! $property ){
      return back()->with('error', 'The property not found!');
    }
    
    $locations = Location::orderBy('name', 'asc')->get()->all();

    return view('admin.property.edit', [
      'property'  => $property,
      'locations' => $locations,
    ]);
  }


  /**
   * Update the specified resource in storage.
   * @param  \App\Models\Property  $property
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update( Property $property, Request $request )
  {
    if( ! $property ){
      return back()->with('error', 'The property not found!');
    }
    
    $validator = Validator::make( $request->all(), [
      'title'            => [ 'required', 'string', 'max:191' ],
      'price'            => [ 'required', 'integer', 'max:999999999' ],
      'dealings_type'    => [ 'required', 'string', 'in:buy,rent' ],
      'property_type'    => [ 'required', 'string', 'in:land,villa,apartment' ],
      'gross_smt'        => [ 'required', 'integer', 'max:9999999' ],
      'net_smt'          => [ 'required', 'integer', 'max:9999999' ],
      'location_id'      => [ 'required', 'integer', 'exists:locations,id' ],
      'overview'         => [ 'required', 'string', 'max:1000' ],
      
      'main_feature'     => [ 'nullable', 'string', 'max:50' ],
      'bedrooms'         => [ 'nullable', 'integer', 'max:9999' ],
      'bathrooms'        => [ 'nullable', 'integer', 'max:9999' ],
      'pool'             => [ 'nullable', 'string', 'in:private,public,no' ],
      'why_buy'          => [ 'nullable', 'string', 'max:2000' ],
      'description'      => [ 'nullable', 'string', 'max:5000' ],
      'featured_media'   => [ 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024', 'dimensions:max_width=1200,max_height=1000' ],
      'gallery_media'    => [ 'nullable' ],
      'gallery_media.*'  => [ 'image', 'mimes:jpg,jpeg,png', 'max:2048', 'dimensions:max_width=2400,max_height=2000' ],
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

    // Validate gallery each file
    if( $request->hasfile('gallery_media') ){
      foreach( $request->file('gallery_media') as $key => $file ){
        if( ! $file->isValid() ){
          $file_no = $key + 1;
          return back()->with('error', "The gallery-media no. {$file_no} has not valid.");
        }
      }
    }

    // Upload featured media & save file location
    $featured_media = null;
    if( $request->hasfile('featured_media') ){
      $featured_file = $request->file('featured_media');
      if( ! $featured_file->isValid() ){
        return back()->with('error', 'The featured-media has not valid!');
      }

      // Remove old featured-media
      if( ! empty($property->featured_media) && Storage::disk('public')->exists( $property->featured_media ) ){
        $deleteMedia = Storage::disk('public')->delete( $property->featured_media );
      }

      /* $table_status = DB::select("show table status like 'properties'");
      $current_id   = $table_status[0]->Auto_increment;
      $filename = 'property--' .$current_id .'__' .$file->getClientOriginalName(); */

      //$name = $file->hashName();
      //$name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
      //$ext = $file->extension();
      //$ext = $file->getClientOriginalExtension();
      //$ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

      $filename = time() . '__' . $featured_file->hashName();
      //$filename = time() . '__' . Str::slug( $name ) . '.' . $ext;
      //$location = $file->storeAs('location', $file-name, 'disk-name');
      $featured_media = $featured_file->storeAs('uploads/property', $filename, 'public');
      //$featured_media = 'storage/' . $upload_media;
    }


    // Get & Set property edited data
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
      'featured_media'  => $featured_media ?? $property->featured_media,
    ];
    
    $propertyUpdated = $property->update( $propertyUpdateData );

    if( $request->hasfile('gallery_media') ){
      $gallery_all = [];

      // Upload gallery file & save file location as media
      foreach( $request->file('gallery_media') as $index => $gallery_file ){
        $filename    = time() . '__' . $gallery_file->hashName();
        $extension   = $gallery_file->getClientOriginalExtension();
        $url = $gallery_file->storeAs('uploads/property', $filename, 'public');

        $gallery_all[] = Media::create([
          'type'         => 'image',
          'filename'     => $filename,
          'extension'    => $extension,
          'storage_type' => 'local',
          'url'          => $url,
        ]);
      }

      // Create gallery with media & property relationship
      foreach( $gallery_all as $media ){
        Gallery::create([
          'media_id'    => $media->id,
          'property_id' => $property->id
        ]);
      }
    }

    return redirect()->route('admin.property.index')
      ->with('success', "The property \"$property->title\" updated successfully!");
  }


  /**
   * Remove the specified resource from storage.
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function destroy( Property $property )
  {
    if( ! $property ){
      return back()->with('error', 'The property not found!');
    }

    if( ! empty($property->featured_media) && Storage::disk('public')->exists( $property->featured_media ) ){
      $deleteMedia = Storage::disk('public')->delete( $property->featured_media );
    }

    $property->gallery()->delete();

    $property->delete();

    return back()->with('success', "The property \"$property->title\" deleted successfully!");
  }


  // Featured-Media Delete
  public function Delete_Featured_Media( $property_id )
  {
    $property = Property::find($property_id);

    if( ! $property ){
      return back()->with('error', 'The property not found!');
    }

    if( ! empty($property->featured_media) && Storage::disk('public')->exists( $property->featured_media ) ){
      $deleteMedia = Storage::disk('public')->delete( $property->featured_media );
    }

    $property->update([ 'featured_media' => null ]);

    return back()->with('success', 'The property featured-media deleted successfully!');
  }


  // Property-Gallery Delete
  public function Delete_Property_Gallery( $gallery_id, $property_id, $media_id )
  {
    $gallery     = Gallery::find($gallery_id);
    $property    = Property::find($property_id);
    $get_gallery = Gallery::where('property_id', $property_id)
                    ->where('media_id', $media_id)->get()->first();

    if( ! $property ){
      return back()->with('error', 'The property not found!');

    } elseif( ! $gallery ){
      return back()->with('error', 'The gallery not found!');

    } elseif( $gallery->property_id != $property_id || $gallery->media_id != $media_id || ! $get_gallery || $get_gallery->id != $gallery->id ){
      return back()->with('error', 'The gallery not matched with this property!');
    }

    $gallery->delete();

    return back()->with('success', 'The gallery-media detached from property successfully!');
  }



}
