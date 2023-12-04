<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'bands';
    private $column = "gender_id";
    private $foreign = "bands_gender_id_foreign";

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger($this->column);
            $table->foreign($this->column)->references('id')->on('genders');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign($this->foreign);
        });
        
        Schema::dropIfExists($this->table);
    }
};
