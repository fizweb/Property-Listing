<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
  use HasFactory;


  // connect with db table
  // public $table = 'galleries';


  // protected $primaryKey = 'id';
  // public $incrementing = false;


  // protected $guarded = [];
  // protected $guarded = array();
  protected $fillable = [
    'media_id',
    'property_id',
  ];


  // Declare any field as json array
  /*protected $casts = [
    'images' => 'array',
  ];*/


  
  public function medias()
  {
    // return $this->belongsTo(Media::class)->withDefault();
    return $this->hasMany(Media::class, 'id', 'media_id');
  }



}
