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


class StockMainController extends Controller
{
    public function index(Content $content)
    {
   
        
       
        return $content
            ->title('Dashboard')
            ->description('appercu')
            ->row(view('admin.stock.title'))
            ->row(function (Row $row) {
                

                $row->column(4, function (Column $column) {
                    $data = ProduitStockModel::all();
                    foreach($data as $v){
                        $v;
                    }
                    $column->append(view('admin.charts.stock',['data' => $data]));
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
