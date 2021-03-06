<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   * @return void
   */
  public function run()
  {
    // Seeder run command
    // php artisan db:seed
    
    \App\Models\Media::factory(500)->create();
    \App\Models\Location::factory(10)->create();
    \App\Models\Property::factory(50)->create();
    \App\Models\Gallery::factory(500)->create();


    $this->call(PageSeeder::class);
    $this->call(UserSeeder::class);


  }



}
