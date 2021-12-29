<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   * @return void
   */
  public function run()
  {
    // php artisan db:seed --class=UserSeeder

    $newUser = [
      'name'     => 'Admin Admin',
      'email'    => 'admin@example.com',
      'password' => '12'
    ];

    User::create( $newUser );

  }

}
