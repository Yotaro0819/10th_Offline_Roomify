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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->decimal('discount_value', 5, 0);
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }

        // DatabaseSeeder.php
    public function run(): void
    {
        $this->call(CouponSeeder::class);
    }

};
