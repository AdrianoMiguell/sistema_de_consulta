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
        Schema::create('consults', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->date('date');
            $table->time('hour', $precision = 0);
            $table->foreignId('doctor_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();

//             Consultas

// titulo
// Descrição
// Data
// Hora
// Público a atender
// id_medico

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consults');
    }
};
