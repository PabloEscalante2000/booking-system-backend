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
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("slot_id")->nullable()->constrained("slots_viables")->cascadeOnDelete();
            $table->foreignId("terapeuta_id")->nullable()->constrained("users")->cascadeOnDelete();
            $table->foreignId("paciente_id")->nullable()->constrained("users")->cascadeOnDelete();
            $table->foreignId("paquete_id")->nullable()->constrained("paquetes")->cascadeOnDelete();
            $table->dateTime("horario")->nullable();
            $table->unsignedSmallInteger("duracion");
            $table->enum("modalidad",["v","p"])->default("p"); // * virtual, presencial
            $table->enum("estatus",["d","r","b"])->default("d"); // * disponible, reservado, bloqueado
            $table->text("razon_cancelacion")->nullable();
            $table->text("notas")->nullable();
            $table->decimal("precio",8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesions');
    } 
};
