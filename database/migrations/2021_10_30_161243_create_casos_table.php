<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->String('code')->unique();
            $table->String('title');
            //Datos Demandante
            $table->String('nameA');
            $table->String('profesionA');
            $table->String('domicilioA');
            $table->String('ciA');

            //Datos Demandado
            $table->String('nameB');
            $table->String('profesionB')->nullable();
            $table->String('domicilioB')->nullable();
            $table->String('ciB')->nullable();

            $table->String('Descripcion');
            $table->timestamps();
   
            //Llaves foranea Juez
            $table->unsignedBigInteger('judge_id')->nullable();
            $table->foreign('judge_id')
            ->references('id')
            ->on('judges')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //Llaves foranea estado
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
            ->references('id')
            ->on('states')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //Llaves foranea Abogado Demandante
            $table->unsignedBigInteger('lawyerA_id');
            $table->foreign('lawyerA_id')
            ->references('id')
            ->on('lawyers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //Llaves foranea Abogado Demandado
            $table->unsignedBigInteger('lawyerB_id')->nullable();
            $table->foreign('lawyerB_id')
            ->references('id')
            ->on('lawyers')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            //Llaves foranea Procurador Demandante
            $table->unsignedBigInteger('attorneyA_id')->nullable();
            $table->foreign('attorneyA_id')
            ->references('id')
            ->on('attorneys')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //Llaves foranea Procurador Demandado
            $table->unsignedBigInteger('attorneyB_id')->nullable();
            $table->foreign('attorneyB_id')
            ->references('id')
            ->on('attorneys')
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
        Schema::dropIfExists('casos');
    }
}
