<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('movie_id')->primary();
            $table->string('movie_title');
            $table->string('movie_description');
            $table->string('movie_image');
            $table->string('movie_duration');  
            $table->string('movie_language');  
            $table->string('movie_releasedate');  
            $table->string('movie_country');  
            $table->string('movie_genre');  
            $table->string('movie_trailer');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
