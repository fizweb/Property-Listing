<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
  use HasFactory;


  // connect with db table
  // public $table = 'pages';


  // protected $primaryKey = 'id';
  // public $incrementing = false;


  // protected $guarded = [];
  // protected $guarded = array();
  protected $fillable = [
    'title',
    'slug',
    'content',
  ];


  // Declare any field as json array
  /* protected $casts = [
    'description' => 'array',
  ]; */



}
