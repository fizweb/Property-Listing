<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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


  
  public function dynamicPricing( $price )
  {
    // base_currency = BDT
    $get_price = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey=edbee230-6ca4-11ec-b17b-a984d7e8ddca&base_currency=BDT");

    $current_currency = Cookie::get('currency', 'bdt');

    if( $get_price->successful() ){
      if( $current_currency == 'usd' ){
        $usd = $price * $get_price->json()['data']['USD'];
        return intval($usd) . ' USD';

      } else{
        return intval($price) . ' BDT';
      }

    } else{
      return intval($price) . ' BDT';
    }
  }



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
