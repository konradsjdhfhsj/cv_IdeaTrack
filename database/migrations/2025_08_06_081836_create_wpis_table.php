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
        Schema::create('wpis', function (Blueprint $table) {
            $table->id();
            $table->string('wpis')->nullable();
            $table->string('tresc')->nullable();
            $table->string('zdj')->nullable();
            $table->string('autor')->nullable();
            $table->string('komentarz')->nullable();
            $table->string('autorkom')->nullable();
            $table->string('id_w')->nullable();
            $table->date('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wpis');
    }
};
