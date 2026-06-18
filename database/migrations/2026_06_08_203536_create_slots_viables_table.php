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
        Schema::create('slots_viables', function (Blueprint $table) {
            $table->id();
            $table->foreignId("terapeuta_id")->constrained("users")->cascadeOnDelete();
            $table->dateTime("fecha_inicio");
            $table->dateTime("fecha_final");
            $table->enum("estatus",["d","r","b"])->default("d"); // * disponible, reservado, bloqueado
            $table->enum("source",["m","g"]); // * manual, generado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots_viables');
    }
};
