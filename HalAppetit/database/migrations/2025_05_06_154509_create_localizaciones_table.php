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
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->string('usuario_dni', 20);
            $table->unsignedBigInteger('restaurante_id');
            $table->decimal('distancia', 10, 2);
        
            $table->primary(['usuario_dni', 'restaurante_id']);
            $table->foreign('usuario_dni')->references('dni')->on('users')->onDelete('cascade');
            $table->foreign('restaurante_id')->references('id')->on('restaurantes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizaciones');
    }
};
