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
        Schema::create('projekt', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa')->nullable();
            $table->string('id_p')->nullable();
            $table->string('opis')->nullable();
            $table->string('autor')->nullable();
            $table->string('zdj')->nullable();
            $table->string('komentarz')->nullable();
            $table->string('autorkom')->nullable();
            $table->string('czlonek')->nullable();
            $table->string('zadanie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projekt');
    }
};
