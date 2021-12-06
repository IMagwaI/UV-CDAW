<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('fullTitle');
            $table->string("director");
            $table->string("year");
            $table->string("rank");
            $table->string("image");
            $table->string("imDBRating");
            $table->string("imDbRatingCount");
            $table->longText("description");
            $table->integer("duree_minute");
            $table->integer("vue");
            $table->string("type");
            $table->string("category");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias');
    }
}
