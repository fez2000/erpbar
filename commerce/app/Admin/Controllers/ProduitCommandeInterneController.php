<?php

namespace App\Admin\Controllers;

use App\Models\ProduitCommandeInterneModel;
use App\Models\CommandeInterneModel;
use App\Models\ProduitModel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProduitCommandeInterneController extends Controller
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
        $grid = new Grid(new ProduitCommandeInterneModel);

        $grid->id('ID');
        $grid->commande_interne_id('commande_interne_id');
        $grid->produit_id('produit_id');
        $grid->quantite('quantite');
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
        $show = new Show(ProduitCommandeInterneModel::findOrFail($id));

        $show->id('ID');
        $show->commande_interne_id('commande_interne_id');
        $show->produit_id('produit_id');
        $show->quantite('quantite');
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
        $form = new Form(new ProduitCommandeInterneModel);

        $form->display('ID');
        $form->text('commande_interne_id', 'Commande interne id');
        
        $form->select('produit_id', 'produit')->options(ProduitModel::all()->pluck('name', 'id'));
        $form->select('commande_interne_id', 'commande')->options(CommandeInterneModel::all()->pluck('id', 'id'));
        $form->text('quantite', 'quantite');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
