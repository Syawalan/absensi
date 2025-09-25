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
        Schema::table('absensi', function (Blueprint $table) {
            $table->time('jam_pulang')->nullable()->change();
            $table->string('foto_pulang')->nullable()->change();
            $table->decimal('lat_pulang', 10, 7)->nullable()->change();
            $table->decimal('lng_pulang', 10, 7)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->time('jam_pulang')->nullable(false)->change();
            $table->string('foto_pulang')->nullable(false)->change();
            $table->decimal('lat_pulang', 10, 7)->nullable(false)->change();
            $table->decimal('lng_pulang', 10, 7)->nullable(false)->change();
        });
    }
};
