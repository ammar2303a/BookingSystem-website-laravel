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
        Schema::create('ticketclasses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('ticketclass_id')->primary();
            $table->string('ticketclass_title');
            $table->string('ticketclass_description');
            $table->string('ticketclass_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketclasses');
    }
};
