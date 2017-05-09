<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaServinets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servinets', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('descripcion', 100);
            $table->integer('valor');
            $table->integer('costo');
            $table->integer('descuento');
            $table->boolean('vigente');
            $table->integer('bajada');
            $table->integer('subida');
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
        Schema::dropIfExists('servinets');
    }
}
