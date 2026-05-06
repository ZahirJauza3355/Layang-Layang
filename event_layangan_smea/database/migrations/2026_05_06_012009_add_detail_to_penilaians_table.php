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
    Schema::table('penilaians', function (Blueprint $table) {
        // Tambah kolom kalau belum ada
        if (!Schema::hasColumn('penilaians', 'kreativitas')) {
            $table->integer('kreativitas')->default(0);
        }
        if (!Schema::hasColumn('penilaians', 'keindahan')) {
            $table->integer('keindahan')->default(0);
        }
        if (!Schema::hasColumn('penilaians', 'keunikan')) {
            $table->integer('keunikan')->default(0);
        }
        if (!Schema::hasColumn('penilaians', 'user_id')) {
            $table->unsignedBigInteger('user_id')->nullable();
        }
    });
}

public function down(): void
{
    Schema::table('penilaians', function (Blueprint $table) {
        $table->dropColumn(['kreativitas', 'keindahan', 'keunikan']);
    });
}
};