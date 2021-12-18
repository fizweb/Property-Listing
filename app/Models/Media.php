<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Media extends Model
{
  use HasFactory;


  // connect with db table
  // public $table = 'media';


  // protected $primaryKey = 'id';
  // public $incrementing = false;


  // protected $guarded = [];
  // protected $guarded = array();
  protected $fillable = [
    'type',
    'original_name',
    'given_name',
    'extension',
    'res_min',
    'res_max',
    'location',
    'url',
  ];


  // Declare any field as json array
  /*protected $casts = [
    'images' => 'array',
  ];*/



}
