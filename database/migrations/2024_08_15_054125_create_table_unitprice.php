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
        Schema::create('table_unitprice', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author');
            $table->string("title");
            $table->string("satuan");
            $table->unsignedBigInteger("rupiah"); //coin
            // $table->unsignedBigInteger("coin"); //coin
            $table->string("imgUrl");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_unitprice');
    }
};
