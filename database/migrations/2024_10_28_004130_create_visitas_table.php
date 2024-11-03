<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id('ID_Visita');
            $table->unsignedBigInteger('ID_Visitante');
            $table->dateTime('Fecha_Hora_Entrada');
            $table->dateTime('Fecha_Hora_Salida')->nullable();
            $table->string('Proposito');
            $table->timestamps();

            $table->foreign('ID_Visitante')->references('ID_Visitante')->on('visitantes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitas');
    }
};
