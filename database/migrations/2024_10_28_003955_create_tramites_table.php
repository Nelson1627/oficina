<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id('ID_Tramite'); // Cambié a 'id' para que sea auto-incremental
            $table->unsignedBigInteger('ID_Visita')->nullable()->index();
            $table->unsignedBigInteger('ID_Usuario')->nullable()->index();
            $table->string('Descripción')->nullable();
            $table->enum('Estado', ['Pendiente', 'En Proceso', 'Finalizado']);
            $table->dateTime('Fecha_Creación');
            $table->timestamps();

            $table->foreign('ID_Visita')->references('ID_Visita')->on('visitas')->onDelete('cascade');
            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('usuarios')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tramites');
    }
};
