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
        Schema::create('horario_excepciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId("terapeuta_id")->constrained("users")->cascadeOnDelete();
            $table->date("expiration_date");
            $table->text("razon");
            $table->enum("tipo",["dia","horas"]);
            $table->date("valido_desde");
            $table->date("valido_hasta");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_excepciones');
    }
};
