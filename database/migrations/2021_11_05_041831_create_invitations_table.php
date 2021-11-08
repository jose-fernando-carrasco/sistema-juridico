<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->String('Descripcion');
            $table->boolean('status');
            $table->timestamps();

            //Llave foranea de procurador 
            $table->unsignedBigInteger('attorney_id');
            $table->foreign('attorney_id')
            ->references('id')
            ->on('attorneys')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        
            //Llave foranea de Abogado 
            $table->unsignedBigInteger('lawyer_id');
            $table->foreign('lawyer_id')
            ->references('id')
            ->on('lawyers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //Llave foranea del caso 
            $table->unsignedBigInteger('caso_id');
            $table->foreign('caso_id')
            ->references('id')
            ->on('casos')
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
        Schema::dropIfExists('invitations');
    }
}
