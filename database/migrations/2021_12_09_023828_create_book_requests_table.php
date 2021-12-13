<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRequestsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('book_requests', function (Blueprint $table) {
      $table->id();
      $table->foreignId('book_id');
      $table->foreignId('sender_id');
      $table->foreignId('receiver_id');
      $table->enum('status', ['Pending', 'Accepted']);
      $table->enum('type', ['Buy', 'Lend']);
//      $table->integer('sender_price');
//      $table->timestamp('sender_from_date');
//      $table->timestamp('sender_to_date');
      $table->boolean('is_free')->default(0);
      $table->text('receiver_note')->nullable();
      $table->string('sender_note')->nullable();
//      $table->integer('receiver_price');
      $table->dateTime('from_date')->nullable();
      $table->dateTime('to_date')->nullable();
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
    Schema::dropIfExists('book_requests');
  }
}
