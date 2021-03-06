<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('slug')->unique();
            $table->string('enlace');
            $table->enum('tipo', ['PRINCIPAL', 'PUBLICITARIO'])->default('PRINCIPAL');
            $table->longText('descripcion')->nullable();
            $table->enum('status', ['ACTIVO', 'DESACTIVO'])->default('ACTIVO');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
