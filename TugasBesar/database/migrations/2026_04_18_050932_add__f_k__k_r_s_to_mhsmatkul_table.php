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
        Schema::table('krs', function (Blueprint $table) {
            $table->foreign('npm')
                ->references('npm')
                ->on('mahasiswa')
                ->onDelete('cascade');

            $table->foreign('kode_matakuliah')
                ->references('kode_matakuliah')
                ->on('matakuliah')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('krs', function (Blueprint $table) {
            $table->dropForeign(['npm']);
            $table->dropForeign(['kode_matakuliah']);
        });
    }
};
