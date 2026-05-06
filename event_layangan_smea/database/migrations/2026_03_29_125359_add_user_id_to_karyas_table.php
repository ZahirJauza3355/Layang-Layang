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
        Schema::table('karyas', function (Blueprint $table) {
            // tambah kolom user_id + relasi ke users
            $table->foreignId('user_id')
                  ->after('id') // posisi setelah id (opsional)
                  ->constrained('users')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyas', function (Blueprint $table) {
            // hapus foreign key dulu
            $table->dropForeign(['user_id']);

            // hapus kolom
            $table->dropColumn('user_id');
        });
    }
};