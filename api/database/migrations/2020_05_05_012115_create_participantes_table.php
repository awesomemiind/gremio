<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 150);
            $table->string('email', 300)->nullable();
            $table->unsignedBigInteger('chapa_id')->nullable();
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->string('slug');
            $table->timestamps();

            $table->foreign('chapa_id')->references('id')->on('chapas');
            $table->foreign('cargo_id')->references('id')->on('tipo_cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
}
