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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->text('address');
            $table->integer('price');
            $table->string('city');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->integer('capacity');
            $table->string('hashtag_name');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->timestamps();

            // 外部キー制約（user_id, category_id）
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
