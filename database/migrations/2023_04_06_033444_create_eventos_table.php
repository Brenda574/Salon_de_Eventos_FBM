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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->double('costo');
            $table->enum('estatus', ['Confirmado', 'Pendiente', 'SinConfirmar'])->default('SinConfirmar');
            $table->string('proposito');
            $table->integer('num_invitados')->unsigned();;
            $table->timestamps();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('paquete_id');

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('paquete_id')->references('id')->on('paquetes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
