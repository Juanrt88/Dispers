<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->string('asunto',50);
            $table->string('nombre',50);
            $table->string('numero_pedido',50)->nullable();
            $table->string('correo',50);
            $table->string('mensaje',50);

            $table->string('estado',50)->default('Pendiente');
            $table->timestamps();
        });




        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('slug',50)->unique();
            $table->string('descripcion',255)->nullable();
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
        Schema::dropIfExists('assistances');
    }
}
