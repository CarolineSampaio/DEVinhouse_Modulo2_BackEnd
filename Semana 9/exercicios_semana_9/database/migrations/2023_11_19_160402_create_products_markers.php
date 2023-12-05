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
        Schema::create('products_markers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table
            ->foreign('product_id')
            ->references('id')
            ->on('products');
            $table->bigInteger('marker_id');
            $table
            ->foreign('marker_id')
            ->references('id')
            ->on('markers')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_markers');
    }
};
