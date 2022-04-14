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
       Schema::create('empleados', function (Blueprint $table) {
           $table->integer('id', 11);
           $table->string('nombre', 255);
           $table->string('email', 255);
           $table->char('sexo', 1);
           $table->integer('area_id', false)->length(11);
           $table->integer('boletin', false)->length(11);
           $table->text('descripcion')->nullable();
           $table->foreign('area_id')->references('id')->on('areas');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('empleados');
     }
};
