<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitCommandeInterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProduitCommandeInterne', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commande_interne_id')->index();
            $table->integer('produit_id')->index();
            $table->float('quantite');
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
        Schema::dropIfExists('ProduitCommandeInterne');
    }
}
