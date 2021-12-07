<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePropertiesTable extends Migration
{
  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('properties', function (Blueprint $table) {
      $table->id();
      // $table->string('name');
      $table->string('title');
      $table->unsignedBigInteger('price');
      $table->set('dealings_type', ['buy', 'rent']);
      $table->set('property_type', ['land', 'villa', 'apartment']);
      $table->string('bedrooms')->nullable();
      $table->string('bathrooms')->nullable();
      $table->string('sft')->nullable()->comment('Square-Feet');
      $table->string('featured_image')->nullable();
      $table->string('image')->nullable();

      $table->timestamps();
    });
  }


  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('properties');
  }

}
