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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->string('foto_masuk');
            $table->decimal('lat_masuk', 10, 8);
            $table->decimal('lng_masuk', 11, 8);
            $table->string('foto_pulang');
            $table->decimal('lat_pulang', 10, 8);
            $table->decimal('lng_pulang', 11, 8);
            $table->enum('status', ['hadir', 'izin', 'alpha', 'sakit'])->default('hadir');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
