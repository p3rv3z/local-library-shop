<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('books', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('description');
      $table->string('isbn')->nullable();
      $table->string('edition')->nullable();
      $table->integer('pages')->default(0);
      $table->integer('price')->default(0);
      $table->integer('lending_rate')->default(0);
      $table->boolean('status')->default(0);
      $table->foreignId('author_id')->nullable();
      $table->foreignId('collection_id')->nullable();
      $table->foreignId('owner_id')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('books');
  }
}
