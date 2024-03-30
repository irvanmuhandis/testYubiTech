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
        Schema::create('sales_styles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('qty');
            $table->unsignedBigInteger('salesorder');
            $table->foreign('salesorder')->references('id')->on('sales_orders');
            $table->unsignedBigInteger('style');
            $table->foreign('style')->references('id')->on('styles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_styles');
    }
};
