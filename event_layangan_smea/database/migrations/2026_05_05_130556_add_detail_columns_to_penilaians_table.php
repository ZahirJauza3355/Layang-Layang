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
    Schema::table('penilaians', function (Blueprint $table) {
        $table->integer('kreativitas')->default(0)->after('total');
        $table->integer('keindahan')->default(0)->after('kreativitas');
        $table->integer('keunikan')->default(0)->after('keindahan');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            //
        });
    }
};
