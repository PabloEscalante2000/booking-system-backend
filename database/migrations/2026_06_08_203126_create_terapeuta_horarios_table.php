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
        Schema::create('terapeuta_horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId("terapeuta_id")->constrained("users")->cascadeOnDelete();
            $table->enum("dia",[0,1,2,3,4,5,6]);
            $table->time("hora_inicio");
            $table->time("hora_final");
            $table->smallInteger("slot_duration");
            $table->boolean("is_active")->default(true);
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
        Schema::dropIfExists('terapeuta_horarios');
    }
};
