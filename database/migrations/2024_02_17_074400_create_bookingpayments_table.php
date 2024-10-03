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
        Schema::create('bookingpayments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('bookingpayment_id')->primary();
            $table->string('booking_id');
            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onUpdate('cascade')->onDelete('cascade');  
            $table->string('payment_id');
            $table->foreign('payment_id')->references('payment_id')->on('payments')->onUpdate('cascade')->onDelete('cascade');  
            $table->string('Amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookingpayments');
    }
};
