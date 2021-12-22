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
      'title'          => $this->faker->sentence($nbWords = 8, $variableNbWords = false),
      'dealings_type'  => $this->faker->randomElement(['buy', 'rent']),
      'property_type'  => $this->faker->randomElement(['land', 'villa', 'apartment']),
      'price'          => $this->faker->numberBetween($min = 500000, $max = 1000000),
      'feature_type'   => $this->faker->randomElement(['penthouse', 'banglow', 'duplex']),
      'bedrooms'       => $this->faker->randomElement([3, 4, null, 5, 6, null, 7, 8, null, 9]),
      'bathrooms'      => $this->faker->randomElement([2, null, 3, null, 4, null, 5]),
      'net_sft'        => $this->faker->numberBetween($min = 1000, $max = 2200),
      'gross_sft'      => $this->faker->numberBetween($min = 1100, $max = 2300),
      'net_smt'        => $this->faker->numberBetween($min = 500, $max = 900),
      'gross_smt'      => $this->faker->numberBetween($min = 600, $max = 980),
      'pool'           => $this->faker->randomElement(['public', 'private', 'no']),
      'location_id'    => Location::all()->random()->id,
      'overview'       => $this->faker->text($maxNbChars = 300),
      'why_buy'        => [
        $this->faker->text($maxNbChars = 60),
        $this->faker->text($maxNbChars = 55),
        $this->faker->text($maxNbChars = 65),
        $this->faker->text($maxNbChars = 45),
        $this->faker->text($maxNbChars = 50),
        $this->faker->text($maxNbChars = 40),
        $this->faker->text($maxNbChars = 70)
      ],
      'description'    => [
        'intro'     => [
          'title' => 'Facilities & location',
          'text'  => [
            $this->faker->text($maxNbChars = 400),
          ]
        ],
        'sub_intro' => [
          'title' => 'About the project and residences',
          'text'  => [
            $this->faker->text($maxNbChars = 400),
            $this->faker->text($maxNbChars = 450),
            $this->faker->text($maxNbChars = 500)
          ]
        ],
        'facilities' => [
          [
            'title' => 'Features and facilities include',
            'text'  => null,
            'lists' => [
              $this->faker->text($maxNbChars = 40),
              $this->faker->text($maxNbChars = 30),
              $this->faker->text($maxNbChars = 45),
              $this->faker->text($maxNbChars = 35),
              $this->faker->text($maxNbChars = 60),
              $this->faker->text($maxNbChars = 50),
              $this->faker->text($maxNbChars = 35),
              $this->faker->text($maxNbChars = 50),
              $this->faker->text($maxNbChars = 55),
              $this->faker->text($maxNbChars = 40),
            ],
            'note'  => null
          ],
          [
            'title' => 'Property prices and availability',
            'text'  => [
              $this->faker->text($maxNbChars = 200),
            ],
            'lists' => [
              $this->faker->text($maxNbChars = 100),
            ],
            'note'  => 'Prices displayed exclude VAT.'
          ],
          [
            'title' => 'Rental potential',
            'text'  => [
              $this->faker->text($maxNbChars = 250),
            ],
            'lists' => null,
            'note'  => null
          ],
          [
            'title' => 'Distances by land',
            'text'  => [
              $this->faker->text($maxNbChars = 35),
              $this->faker->text($maxNbChars = 40),
              $this->faker->text($maxNbChars = 35),
            ],
            'lists' => null,
            'note'  => null
          ],
          [
            'title' => 'Distances by sea',
            'text'  => [
              $this->faker->text($maxNbChars = 40),
              $this->faker->text($maxNbChars = 48),
              $this->faker->text($maxNbChars = 42),
              $this->faker->text($maxNbChars = 44),
              $this->faker->text($maxNbChars = 52),
            ],
            'lists' => null,
            'note'  => null
          ],
        ]
      ],
      'featured_media' => Media::all()->random()->url,
      // 'image'          => $this->faker->imageUrl(480, 380, 'nature', true, 'Featured-Image', true),
    ];
  }



}
