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
        Schema::create('table_notification', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("author");
            $table->bigInteger("target");
            $table->string("type");
            $table->text("title");
            $table->text("content");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_notification');
    }
};
