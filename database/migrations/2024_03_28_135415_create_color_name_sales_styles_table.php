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
        Schema::create('color_name_sales_styles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('colormethod_sales');
            $table->foreign('colormethod_sales')->references('id')->on('color_method_sales');
            $table->integer('qty');
            $table->unsignedBigInteger('color_name');
            $table->foreign('color_name')->references('id')->on('color_method_names');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_name_sales_styles');
    }
};
