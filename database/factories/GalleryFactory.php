<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;


class GalleryFactory extends Factory
{
  /**
   * Define the model's default state.
   * @return array
   */
  public function definition()
  {
    return [
      'media_id'    => Media::all()->random()->id,
      'property_id' => Property::all()->random()->id,
    ];
  }
  
}
