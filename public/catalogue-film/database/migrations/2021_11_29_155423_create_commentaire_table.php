<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            // define foreign key media_id
            $table->foreignId( 'media_id' )->constrained()->onDelete('cascade' );
            $table->foreignId( 'user_id' )->constrained()->onDelete('cascade' );
            $table->string('text');
            $table->boolean('etat_moderation');
            $table->timestamp('date_moderation')->nullable('true');
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
        Schema::dropIfExists('commentaires');
    }
}
