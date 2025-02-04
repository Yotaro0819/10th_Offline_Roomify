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
            $table->id();
            $table->string('guest_name');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('num_guest');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('accommodation_id')->constrained('accommodations')->onDelete('cascade');
            $table->timestamps();
            $table->integer('status')->default(1); //(1: confirmed, 2: processing, 0: canceled)
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
