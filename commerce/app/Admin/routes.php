<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    //$router->get('/stock/fournisseur', 'Fournissuer@index')->name('admin.home');
    Route::prefix('stock')->group(function(){
        Route::get('/', 'StockMainController@index')->name('admin.stock');
        Route::resource('/produit', 'ProduitController');
        Route::resource('/produitstock', 'ProduitStockController');
        Route::resource('/produitcommandeinterne', 'ProduitCommandeInterneController');
        Route::resource('/commande', 'CommandeInterneController');
        Route::resource('/stock', 'StockController');
        
        Route::resource('/produitfacture', 'ProduitFactureController');
        Route::resource('/facture', 'FactureController');
        Route::resource('/fournisseur', 'FournisseurController');
        Route::resource('/produitcathegorie', 'CathegorieController');
    });
    Route::prefix('paie')->group(function(){
        Route::resource('/employer', 'BulletinPayeController');
        Route::get('/', 'PaieMainController@index')->name('admin.paie');
    });
    Route::prefix('comptabilite')->group(function(){
        Route::get('/', 'ComptabiliteMainController@index')->name('admin.comptabilite');
        Route::resource('/employer', 'EmployerController');
        Route::resource('/poste', 'PosteController');
        Route::resource('/etats', 'EtatController');
    });
});
