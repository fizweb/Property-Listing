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
      $table->string('title');
      $table->unsignedInteger('price');
      $table->set('dealings_type', ['buy', 'rent']);
      $table->set('property_type', ['land', 'villa', 'apartment']);
      $table->string('main_feature')->nullable(); // penthouse, banglow, duplex
      $table->unsignedSmallInteger('bedrooms')->nullable();
      $table->unsignedSmallInteger('bathrooms')->nullable();
      $table->unsignedMediumInteger('gross_smt')->comment('Gross Square-Meter');
      $table->unsignedMediumInteger('net_smt')->comment('Net Square-Meter');
      $table->set('pool', ['public', 'private', 'no'])->nullable();
      $table->unsignedBigInteger('location_id');
      $table->text('overview');
      $table->text('why_buy')->nullable();
      $table->mediumText('description')->nullable();
      $table->string('featured_media')->nullable();

      $table->timestamps();

      // $table->foreign('featured_media_id')
      //   ->references('id')->on('media')->onUpdate('cascade');
      $table->foreign('location_id')
        ->references('id')->on('locations')->onUpdate('cascade');
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
