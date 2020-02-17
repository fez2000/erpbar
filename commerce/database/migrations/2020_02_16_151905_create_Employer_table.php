<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('image')->nullable();
            $table->integer('poste')->index();
            $table->string('telephone');
            $table->integer('compte')->index();
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
        Schema::dropIfExists('Employer');
    }
}
