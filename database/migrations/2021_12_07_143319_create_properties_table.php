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
      $table->set('dealings_type', ['buy', 'rent']);
      $table->set('property_type', ['land', 'villa', 'apartment']);
      $table->unsignedInteger('price');
      $table->string('feature_type');
      $table->unsignedSmallInteger('bedrooms')->nullable();
      $table->unsignedSmallInteger('bathrooms')->nullable();
      $table->unsignedMediumInteger('net_sft')->nullable()->comment('Net Square-Feet');
      $table->unsignedMediumInteger('gross_sft')->nullable()->comment('Gross Square-Feet');
      $table->unsignedMediumInteger('net_smt')->nullable()->comment('Net Square-Meter');
      $table->unsignedMediumInteger('gross_smt')->nullable()->comment('Gross Square-Meter');
      $table->set('pool', ['public', 'private', 'no']);
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
