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
        Schema::create('table_artikel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author');
            $table->longText("title");
            $table->longText("content"); //ketika video -> menjadi link url video
            $table->string("imgUrl");
            $table->boolean("isVideo")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_artikel');
    }
};
