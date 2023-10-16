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
        Schema::create('worddefinitions', function (Blueprint $table) {
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->unsignedBigInteger('definition_id');
            $table->foreign('definition_id')->references('id')->on('definitions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worddefinitions');
    }
};
