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
        Schema::create('empleado', function (Blueprint $table) {
          $table->integer('id', 11);
          $table->string('nombre', 255);
          $table->string('email', 255);
          $table->char('sexo', 1);
          $table->integer('area_id', false)->length(11);
          $table->integer('boletin', false)->length(11)->nullable();
          $table->text('descripcion');
          $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
};
