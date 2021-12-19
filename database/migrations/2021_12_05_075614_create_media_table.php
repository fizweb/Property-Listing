<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateMediaTable extends Migration
{
  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('media', function (Blueprint $table) {
      $table->id();
      $table->string('type')->nullable(); // what type of media = image - audio - video
      $table->string('original_name')->nullable(); // media original file name
      $table->string('given_name')->nullable(); // media given name by user
      $table->string('extension')->nullable(); // media file extension
      $table->string('res_min')->nullable(); // media minimum resolution
      $table->string('res_max')->nullable(); // media maximum resolution
      $table->string('location')->nullable(); // media saved location
      $table->string('url')->nullable(); // media access full url

      $table->timestamps();
    });
  }


  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('media');
  }

}
