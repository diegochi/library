<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('books', function (Blueprint $table)
      {
        $table->increments('id');
        $table->string('name', 50);
        $table->string('author', 50);
        $table->string('category', 50);
        $table->date('published_date');
        $table->char('available', 1)->default('Y');
        $table->string('user', 50);
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
