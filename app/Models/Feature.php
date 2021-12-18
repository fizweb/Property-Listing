<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{
  use HasFactory;


  // connect with db table
  // public $table = 'features';


  // protected $primaryKey = 'id';
  // public $incrementing = false;


  // protected $guarded = [];
  // protected $guarded = array();
  protected $fillable = [
    // 'name',
    // 'title',
  ];


  // Declare any field as json array
  /*protected $casts = [
    'images' => 'array',
  ];*/



}
