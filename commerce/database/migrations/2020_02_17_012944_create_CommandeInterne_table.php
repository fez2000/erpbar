<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeInterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CommandeInterne', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auteur')->index();
            $table->date('date');
            $table->enum('status',['ENCOUR','VALIDER','REJETER'])->default('ENCOUR');
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
        Schema::dropIfExists('CommandeInterne');
    }
}
