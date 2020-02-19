<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProduitStock', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_id')->index();
            $table->integer('stock_id')->index();
            $table->float('min');
            $table->float('max');
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
        Schema::dropIfExists('ProduitStock');
    }
}
