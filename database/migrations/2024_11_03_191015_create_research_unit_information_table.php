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
        Schema::create('research_unit_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->json('form');
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('adder');
            $table->foreign('adder')->references('id')->on('users');
            $table->unsignedBigInteger('editor');
            $table->foreign('editor')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_unit_information');
    }
};
