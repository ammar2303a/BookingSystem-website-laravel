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
        Schema::create('bookings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('booking_id')->primary();
            $table->string('movie_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('show_id');
            $table->foreign('show_id')->references('show_id')->on('shows')->onUpdate('cascade')->onDelete('cascade');
            $table->string('booking_status');
            $table->string('seat_number');
            $table->string('booking_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
