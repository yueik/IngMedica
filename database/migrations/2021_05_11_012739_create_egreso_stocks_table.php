<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresoStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egreso_stocks', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->unsignedBigInteger('cliente_id');
            $table->float('montoFinal');
            $table->unsignedBigInteger('estado_id');
            $table->text('observacion');
            $table->boolean('activo');

            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('estado_id')->references('id')->on('estado_egresos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egreso_stocks');
    }
}
