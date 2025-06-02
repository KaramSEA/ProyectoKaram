<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imagenes_resenas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resena_id');
            $table->string('url_imagen');
            $table->string('descripcion')->nullable();

            $table->foreign('resena_id')->references('id')->on('resenas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagenes_resenas');
    }
};
