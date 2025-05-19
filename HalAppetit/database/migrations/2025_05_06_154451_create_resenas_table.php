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
        Schema::create('resenas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurante_id');
            $table->string('usuario_dni', 20);
            $table->string('nombre_anonimo')->nullable();
            $table->unsignedTinyInteger('puntuacion');
            $table->text('comentario')->nullable();
            $table->timestamp('fecha')->useCurrent();
        
            $table->foreign('restaurante_id')->references('id')->on('restaurantes')->onDelete('cascade');
            $table->foreign('usuario_dni')->references('dni')->on('usuarios')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};
