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
        Schema::create('table_sampah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author');
            $table->bigInteger("unitid");
            $table->string("satuan");
            $table->bigInteger("price")->nullable(true); //coin
            $table->bigInteger("total"); //berat
            $table->string("imgUrl");
            $table->boolean("isProcessed")->default(false); //telah diproses admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sampah');
    }
};
