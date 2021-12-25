<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
  use HasFactory;


  // connect with db table
  // public $table = 'contacts';


  // protected $primaryKey = 'id';
  // public $incrementing = false;


  // protected $guarded = [];
  // protected $guarded = array();
  protected $fillable = [
    'name',
    'email',
    'phone',
    'message',
    'property_id'
  ];


  // Declare any field as json array
  /* protected $casts = [
    'description' => 'array',
  ]; */

  

  public function property()
  {
    return $this->belongsTo(Property::class, 'property_id')->withDefault();
  }



}
