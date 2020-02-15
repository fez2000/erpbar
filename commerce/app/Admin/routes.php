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
 
        Route::resource('/fournisseur', 'FournisseurController');
        Route::resource('/produitcathegorie', 'CathegorieController');
    });
    Route::prefix('comptabilite')->group(function(){
 
        //Route::resource('/cour', 'CourPlanningController');
        
    });
});
