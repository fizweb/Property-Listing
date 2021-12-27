<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Property extends Model
{
  use HasFactory;


  // connect with db table
  // public $table = 'properties';


  // protected $primaryKey = 'id';
  // public $incrementing = false;


  // protected $guarded = [];
  // protected $guarded = array();
  protected $fillable = [
    'title',
    'price',
    'dealings_type',
    'property_type',
    'main_feature',
    'bedrooms',
    'bathrooms',
    'gross_smt',
    'net_smt',
    'pool',
    'location_id',
    'overview',
    'why_buy',
    'description',
    'featured_media',
  ];


  // Declare any field as json array
  /* protected $casts = [
    'why_buy'     => 'array',
    'description' => 'array',
  ]; */



  /* public function featured_media()
  {
    return $this->belongsTo(Media::class, 'featured_media_id')->withDefault();
  } */

  public function location()
  {
    return $this->belongsTo(Location::class, 'location_id')->withDefault();
  }

  public function gallery()
  {
    return $this->hasMany(Gallery::class, 'property_id');
  }


  
}
