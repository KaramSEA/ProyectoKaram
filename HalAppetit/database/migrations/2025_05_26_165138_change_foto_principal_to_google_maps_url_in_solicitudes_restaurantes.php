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
        Schema::table('solicitudes_restaurantes', function (Blueprint $table) {
            $table->string('google_maps_url')->nullable()->after('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitudes_restaurantes', function (Blueprint $table) {
            $table->dropColumn('google_maps_url');
        });
    }
};