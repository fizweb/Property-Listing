<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class MediaFactory extends Factory
{
  /**
   * Define the model's default state.
   * @return array
   */
  public function definition()
  {
    return [
      'type'          => 'image',
      'filename'      => '',
      'extension'     => '',
      'min_res'       => '',
      'max_res'       => '',
      'storage_type'  => 'remote',
      // 'url'           => $this->faker->imageUrl(1200, 800, 'nature', true, '', true),
      'url'           => $this->faker->randomElement([
        'https://source.unsplash.com/random/1600×1200/?property',
        'https://source.unsplash.com/random/1600×1200/?building',
        'https://source.unsplash.com/random/1600×1200/?housing',
        'https://source.unsplash.com/random/1600×1200/?architecture',
        'https://source.unsplash.com/random/1600×1200/?construction',
        'https://source.unsplash.com/random/1600×1200/?renovation',
        'https://source.unsplash.com/random/1600×1200/?home',
        'https://source.unsplash.com/random/1600×1200/?house',
        'https://source.unsplash.com/random/1600×1200/?apartment',
        'https://source.unsplash.com/random/1600×1200/?urban',
        'https://source.unsplash.com/random/1600×1200/?village',
        'https://source.unsplash.com/random/1600×1200/?town',
        'https://source.unsplash.com/random/1600×1200/?city',
        'https://source.unsplash.com/random/1600×1200/?cityscape',
        'https://source.unsplash.com/random/1600×1200/?street',
        'https://source.unsplash.com/random/1600×1200/?skyscraper',
      ]),
    ];
  }

}
