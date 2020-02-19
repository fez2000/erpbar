<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovisionementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Approvisionement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_id')->index();
            $table->float('quantite');
            $table->date('date');
            $table->integer('sock_id')->index();
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
        Schema::dropIfExists('Approvisionement');
    }
}
