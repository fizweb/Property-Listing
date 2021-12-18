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
    'dealings_type',
    'property_type',
    'price',
    'feature_type',
    'bedrooms',
    'bathrooms',
    'net_sft',
    'gross_sft',
    'net_smt',
    'gross_smt',
    'pool',
    'location_id',
    'overview',
    'why_buy',
    'description',
    'featured_media',
  ];


  // Declare any field as json array
  /*protected $casts = [
    'images' => 'array',
  ];*/



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
