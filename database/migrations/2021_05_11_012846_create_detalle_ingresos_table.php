<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ingreso_stock_id');
            $table->unsignedBigInteger('implante_id');
            $table->float('costo');
            $table->boolean('activo');

            $table->timestamps();

            $table->foreign('ingreso_stock_id')->references('id')->on('ingreso_stocks');
            $table->foreign('implante_id')->references('id')->on('implantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingresos');
    }
}
