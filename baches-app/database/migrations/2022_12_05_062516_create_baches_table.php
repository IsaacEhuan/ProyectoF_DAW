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
        Schema::create('baches', function (Blueprint $table) {
            $table->id();
            //$table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamp('fecha_creacion')->require_once;
            $table->text('descripcion')->require;
            $table->tinyInteger('estado',false,true)->default(0)->require;
            $table->string("imagen");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baches');
    }
};
