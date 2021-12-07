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

    // \App\Models\User::factory(10)->create();
    
    \App\Models\Property::factory(10)->create();

  }



}
