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
        Schema::table('baches', function (Blueprint $table) {
            $table->bigInteger('id_usuario');
            $table->float('latitud',10,7);
            $table->float('longitud',10,7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baches', function (Blueprint $table) {
            //
        });
    }
};
