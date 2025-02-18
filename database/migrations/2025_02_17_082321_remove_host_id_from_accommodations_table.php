<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->dropColumn('host_id'); // host_id カラムを削除
        });
    }

    public function down()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->unsignedBigInteger('host_id')->nullable(); // もしロールバックする場合は復元できるようにする
        });
    }
};

