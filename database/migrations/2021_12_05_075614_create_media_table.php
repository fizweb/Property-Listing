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
      $table->string('filename')->nullable(); // media file name
      $table->string('extension')->nullable(); // media file extension
      $table->string('min_res')->nullable(); // media minimum resolution
      $table->string('max_res')->nullable(); // media maximum resolution
      $table->string('storage_type')->nullable(); // local - amazon s3 - remote url
      $table->string('url'); // media access url

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
