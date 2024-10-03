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
        Schema::create('shows', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('show_id')->primary();
            $table->string('show_date');
            $table->string('show_starttime');  
            $table->string('show_endtime');  
            $table->string('cinema_id');
            $table->foreign('cinema_id')->references('cinema_id')->on('cinemas')->onUpdate('cascade')->onDelete('cascade');  
            $table->string('movie_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onUpdate('cascade')->onDelete('cascade');  
            $table->string('ticketclass_id');
            $table->foreign('ticketclass_id')->references('ticketclass_id')->on('ticketclasses')->onUpdate('cascade')->onDelete('cascade');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
