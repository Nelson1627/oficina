<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('informes', function (Blueprint $table) {
            $table->integer('ID_Informe', true);
            $table->integer('ID_Visita')->nullable()->index('ID_Visita');
            $table->integer('ID_Usuario')->nullable()->index('ID_Usuario');
            $table->dateTime('Fecha_Informe');
            $table->text('Contenido')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes');
    }
};






