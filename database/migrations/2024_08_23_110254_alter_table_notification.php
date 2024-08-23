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
        Schema::table('table_notification', function (Blueprint $table) {
            $table->dropColumn('target');
            $table->boolean('isRead')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_notification', function (Blueprint $table) {
            $table->bigInteger('target');
            $table->dropColumn('isRead');
        });
    }
};
