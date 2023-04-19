<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('inquiries', function (Blueprint $table) {
      $table->id();
      $table->string('salutation')->nullable();
      $table->string('firstname');
      $table->string('name');
      $table->string('street');
      $table->string('street_number')->nullable();
      $table->string('zip');
      $table->string('city');
      $table->string('country');
      $table->string('email');
      $table->string('phone');
      $table->text('message')->nullable();
      $table->decimal('number_suites', 4, 0);
      $table->decimal('number_guests', 4, 0);
      $table->string('suite_type');
      $table->date('arrival_date');
      $table->date('departure_date');
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
    Schema::dropIfExists('inquiries');
  }
};
