<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_egresos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('egreso_stock_id');
            $table->unsignedBigInteger('implante_id');
            $table->float('monto');
            $table->boolean('activo');

            $table->timestamps();

            $table->foreign('egreso_stock_id')->references('id')->on('egreso_stocks');
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
        Schema::dropIfExists('detalle_egresos');
    }
}
