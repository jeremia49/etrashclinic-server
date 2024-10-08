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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nohp');
            $table->string('photoUrl');
            $table->string('fcmToken')->nullable();
            $table->timestamp('fcmLastUpdate')->nullable();
            $table->unsignedBigInteger('coinBalance')->default(0); //Koin
            $table->unsignedBigInteger('saldoBalance')->default(0); //Saldo
            $table->rememberToken();
            $table->boolean('isAdmin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
