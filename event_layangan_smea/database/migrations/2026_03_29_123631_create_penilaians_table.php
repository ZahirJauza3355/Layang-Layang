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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();

            // relasi ke karya
            $table->foreignId('karya_id')
                  ->constrained('karyas')
                  ->cascadeOnDelete();

            // relasi ke user (juri)
            $table->foreignId('juri_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // nilai
            $table->integer('kreativitas');
            $table->integer('keindahan');
            $table->integer('keunikan');
            $table->integer('total');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};