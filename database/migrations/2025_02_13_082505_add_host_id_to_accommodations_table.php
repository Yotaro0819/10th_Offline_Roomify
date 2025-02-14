<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            if (!Schema::hasColumn('accommodations', 'host_id')) {
                $table->unsignedBigInteger('host_id')->nullable(false);
            }
        });
    }

    public function down()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->dropColumn('host_id');
        });
    }


};
