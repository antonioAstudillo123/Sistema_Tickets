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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->nullable()->default('N/D');
            $table->string('marca')->default('Genérica')->nullable();
            $table->string('modelo')->nullable();
            $table->string('procesador')->nullable();
            $table->string('ram')->nullable();
            $table->string('almacenamiento')->nullable();
            $table->string('sistema_operativo')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->date('fecha_garantia')->nullable();
            $table->unsignedBigInteger('assigned_user')->nullable();
            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->text('notas')->nullable();
            $table->string('estatus');
            $table->timestamps();
            $table->foreign('assigned_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
