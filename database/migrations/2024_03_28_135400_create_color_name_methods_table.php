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
        Schema::create('color_name_methods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('color_method');
            $table->foreign('color_method')->references('id')->on('color_methods');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_name_methods');
    }
};
