<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use App\Models\ProduitStockModel;
use App\Models\StockModel;
use App\Models\ProduitModel;
use App\Models\EmployerModel;
use App\Models\ProduitCommandeInterneModel;
class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(view('admin.title'))
            ->row(function (Row $row) {
                
                $row->column(4, function (Column $column) {
                    $column->append(view('admin.stockpreview',['commande_pas_traiter' => ProduitCommandeInterneModel::where('status = ENCOUR')->get()->count(),'nombre_stock'=>StockModel::all()->count() ,'nombre_alert' => ProduitStockModel::where('quantite', '<=' <'min')->count()]));
                });

                $row->column(4, function (Column $column) {
                    $capital = 0;
                    foreach (ProduitStockModel::all() as $p){
                        $pr = ProduitModel::where('id' ,'=',$p->produit_id)->get();
                        $capital += $p->quantite * $pr[0]->prix_vente;
                    }
                    $column->append(view('admin.comptabilitepreview',['capital'=> $capital ,'employer' => EmployerModel::all()->count()]));
                });

                $row->column(4, function (Column $column) {
                  //  $column->append();
                });
            });
    }
}
