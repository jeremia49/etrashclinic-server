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
        Schema::table('table_leaderboards', function (Blueprint $table) {
            $table->unsignedInteger('tahun');
            $table->unsignedInteger('bulan');
            $table->bigInteger('authorID');
            $table->bigInteger('totalSampah');
            $table->unsignedInteger('rank');
            $table->string('league');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_leaderboards', function (Blueprint $table) {
            $table->dropColumn('tahun');
            $table->dropColumn('bulan');
            $table->dropColumn('authorID');
            $table->dropColumn('totalSampah');
            $table->dropColumn('rank');
            $table->dropColumn('league');
        });
    }
};
