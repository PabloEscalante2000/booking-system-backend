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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sesion_id")->nullable()->constrained("sesions")->cascadeOnDelete();
            $table->foreignId("paquete_id")->nullable()->constrained("paquetes")->cascadeOnDelete();
            $table->decimal("monto",8,2);
            $table->enum("estado",["c","p","a"])->default("p"); // * completado, pendiente, anulado
            $table->date("fecha_pago");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
