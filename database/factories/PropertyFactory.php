<?php

namespace Database\Factories;

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
      'title'          => $this->faker->realText($maxNbChars = 40, $indexSize = 2),
      'price'          => $this->faker->randomElement([
        490000, 350000, 580000, 770000, 640000, 980000, 110000000, 10500000, 15000000, 2000000
      ]),
      'dealings_type'  => $this->faker->randomElement(['buy', 'rent']),
      'property_type'  => $this->faker->randomElement(['land', 'villa', 'apartment']),
      'bedrooms'       => $this->faker->randomElement([3, null, 7, null, 5, null, 8]),
      'bathrooms'      => $this->faker->randomElement([3, null, 2, null, 4]),
      'sft'            => $this->faker->randomElement([15000, 22000, 10000, 18000, 12000]),
      // 'featured_image' => $this->faker->imageUrl($width = 480, $height = 380),
      'featured_image' => $this->faker->imageUrl(480, 380, 'nature', true, 'Featured-Image', true),
      'image'          => null,
    ];
  }



}
