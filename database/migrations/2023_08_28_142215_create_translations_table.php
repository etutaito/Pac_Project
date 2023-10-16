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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sourceword_id');
            $table->foreign('sourceword_id')->references('id')->on('words')->onDelete('cascade');
            $table->unsignedBigInteger('translatedword_id');
            $table->foreign('translatedword_id')->references('id')->on('words')->onDelete('cascade');
            $table->unsignedBigInteger('targetlanguage_id');
            $table->foreign('targetlanguage_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
