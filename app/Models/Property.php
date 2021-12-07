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
    // 'name',
    'title',
    'price',
    'dealings_type',
    'property_type',
    'bedrooms',
    'bathrooms',
    'sft',
    'featured_image',
    'image',
  ];


  // Declare any field as json array
  /*protected $casts = [
    'images' => 'array',
  ];*/


  
}
