<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;


class PropertyFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   * @var string
   */
  // protected $model = Property::class;


  /**
   * Define the model's default state.
   * @return array
   */
  public function definition()
  {
    return [
      // 'name'           => $this->faker->name,
      // 'title'          => $this->faker->sentence($nbWords = 7, $variableNbWords = true), // 'Sit vitae voluptas sint non voluptates.'
      /* 'title'          => $this->faker->randomElement([
        $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        $this->faker->sentence($nbWords = 8, $variableNbWords = true),
        $this->faker->sentence($nbWords = 7, $variableNbWords = true),
      ]), */
      'title'          => $this->faker->sentence($nbWords = 12, $variableNbWords = true),
      'dealings_type'  => $this->faker->randomElement(['buy', 'rent']),
      'property_type'  => $this->faker->randomElement(['land', 'villa', 'apartment']),
      'price'          => $this->faker->numberBetween($min = 490000, $max = 2500000),
      'feature_type'   => $this->faker->randomElement(['penthouse']),
      'bedrooms'       => $this->faker->randomElement([3, null, 7, null, 5, null, 8, 6]),
      'bathrooms'      => $this->faker->randomElement([3, null, 2, null, 4, 5]),
      'net_sft'        => $this->faker->numberBetween($min = 1000, $max = 2200),
      'gross_sft'      => $this->faker->numberBetween($min = 1100, $max = 2300),
      'net_smt'        => $this->faker->numberBetween($min = 500, $max = 900),
      'gross_smt'      => $this->faker->numberBetween($min = 600, $max = 980),
      'pool'           => $this->faker->randomElement(['public', 'private', 'no']),
      'location_id'    => Location::all()->random()->id,
      'overview'       => $this->faker->text($maxNbChars = 300),
      'why_buy'        => $this->faker->text($maxNbChars = 1000),
      'description'    => $this->faker->text($maxNbChars = 500),
      'featured_media' => Media::all()->random()->url,
      // 'image'          => $this->faker->imageUrl(480, 380, 'nature', true, 'Featured-Image', true),
    ];
  }



}
