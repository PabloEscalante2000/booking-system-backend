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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("terapeuta_id")->nullable()->constrained("users")->cascadeOnDelete();
            $table->foreignId("paciente_id")->nullable()->constrained("users")->cascadeOnDelete();
            $table->text("notas")->nullable();
            $table->smallInteger("num_sesiones");
            $table->decimal("precio_total",8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
