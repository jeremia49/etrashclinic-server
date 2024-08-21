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
            $table->string("satuan")->nullable(true); //
            $table->bigInteger("price")->nullable(true); //
            $table->bigInteger("total"); //berat
            $table->string("imgUrl");
            $table->boolean("isApproved")->default(false); //diterima
            $table->boolean("isDeclined")->default(false); //diterima
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
