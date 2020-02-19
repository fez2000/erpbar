<?php

namespace App\Admin\Controllers;

use App\Models\ProduitStockModel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\ProduitModel;
use App\Models\StockModel;

class ProduitStockController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProduitStockModel);

        $grid->id('ID');
        $grid->produit('produit');
        $grid->stock('stock', function($s){
            return $s->name;
        });
        $grid->quantite('quantite');
        $grid->min('quantite min');
        $grid->max('quantite max');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ProduitStockModel::findOrFail($id));

        $show->id('ID');
        $show->produit('produit_id');
        $show->stock('stock_id');
        $show->quantite('quantite');
        $form->min('quantite min');
        $form->max('quantite max');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ProduitStockModel);

        
        $form->select('produit_id', 'produit')->options(ProduitModel::all()->pluck('name', 'id'));
        $form->select('stock_id', 'stock')->options(StockModel::all()->pluck('name', 'id'));
        $form->number('quantite', 'quantite')->min(0);
        $form->number('min', 'quantite min')->min(0);
        $form->number('max', 'quantite max')->min(0);


        return $form;
    }
}
