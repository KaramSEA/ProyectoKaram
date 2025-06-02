<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad', 100);
            $table->decimal('latitud', 10, 8);
            $table->decimal('longitud', 10, 8);
            $table->string('tipo_cocina', 100);
            $table->text('descripcion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('foto_principal')->nullable();
            $table->unsignedBigInteger('administrador_id');

            $table->foreign('administrador_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurantes');
    }
};
