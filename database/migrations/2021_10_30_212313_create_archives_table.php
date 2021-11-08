<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->String('Descripcion');
            $table->timestamps();

             //Llave foranea de Expediente
             $table->unsignedBigInteger('file_id');
             $table->foreign('file_id')
             ->references('id')
             ->on('files')
             ->onDelete('cascade')
             ->onUpdate('cascade');


            //Llave foranea de Tipo de archivo
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
            ->references('id')
            ->on('types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
}
