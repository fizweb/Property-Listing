<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGalleriesTable extends Migration
{
  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('galleries', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('media_id');
      $table->unsignedBigInteger('property_id');

      $table->timestamps();

      $table->foreign('media_id')
        ->references('id')->on('media')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('property_id')
        ->references('id')->on('properties')->onUpdate('cascade')->onDelete('cascade');
    });
  }


  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('galleries');
  }

}
