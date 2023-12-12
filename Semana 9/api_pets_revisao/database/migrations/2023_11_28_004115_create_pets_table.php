<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('breed_id');
            $table->unsignedBigInteger('specie_id');

            $table->string('name', 150);
            $table->integer('age')->nullable();
            $table->float('weight')->nullable();
            $table->enum('size', ['SMALL', 'MEDIUM', 'LARGE', 'EXTRA LARGE']);
            $table->timestamps(); //created_at e updated_at

            $table->foreign('breed_id')->references('id')->on('breeds');
            $table->foreign('specie_id')->references('id')->on('species');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('pets');
    }
};
