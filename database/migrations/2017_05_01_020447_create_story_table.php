<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamp('date');
            $table->integer('page');
            $table->integer('chapter')->nullable();
            $table->boolean('is_end');
            $table->text('summary')->nullable();
            $table->integer('book_id')->unsigned();

            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');
            
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
        Schema::dropIfExists('story');
    }
}
