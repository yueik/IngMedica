<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImplantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implantes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('talle_id');
            $table->string('codigo');
            $table->string('serie');
            $table->unsignedBigInteger('estado_id');
            $table->boolean('activo');

            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('talle_id')->references('id')->on('talles');
            $table->foreign('estado_id')->references('id')->on('estado_insumos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('implantes');
    }
}
