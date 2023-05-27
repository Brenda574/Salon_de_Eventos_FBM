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
        Schema::create('abonos', function (Blueprint $table) {
            $table->id();
            $table->double('monto');
            $table->enum('tipo_pago', ['Efectivo', 'Credito', 'Debito'])->default('Efectivo');
            $table->unsignedBigInteger('evento_id');
            $table->timestamps();

            $table->foreign('evento_id')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonos');
    }
};
