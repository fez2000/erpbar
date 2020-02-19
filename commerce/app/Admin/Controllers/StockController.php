<?php

namespace App\Admin\Controllers;

use App\Models\StockModel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\ProduitModel;

class StockController extends Controller
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
        $grid = new Grid(new StockModel);

        $grid->id('ID');
        $grid->name('name');
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
        $show = new Show(StockModel::findOrFail($id));

        $show->id('ID');
        $show->name('name');
        $show->produitstock('produit en stock',function ($produit) {

        $produit->resource('/admin/stock/produitstock');

        $produit->id();
        $produit->produit_id();
        $produit->quantite();
        $produit->min('quantite min');
        $produit->max('quantite max');
        $produit->created_at();
        $produit->updated_at();

        });
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
        $form = new Form(new StockModel);


        $form->text('name', 'Nom du stock');
        $form->hasMany('produitstock', 'Produit en stock' ,function (Form\NestedForm $form) {
            
            $form->select('produit_id', 'produit')->options(ProduitModel::all()->pluck('name', 'id'));
            $form->number('min', 'quantite min')->min(0);
            $form->number('max', 'quantite max')->min(0);
            $form->number('quantite', 'quantite')->min(0);
            
        });
        
        return $form;
    }
}
