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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_mantenimiento')->nullable();
            $table->string('tipo_mantenimiento')->nullable(); //Preventivo o Correctivo
            $table->text('descripcion')->nullable();
            $table->string('estatus'); // En proceso, Completado
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('id_equipo')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();  //Es el usuario el que va a realizar el mantenimiento

            $table->foreign('id_equipo')->references('id')->on('equipos');
            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
