<?php

namespace App\Admin\Controllers;

use App\Models\ProduitModel;
use App\Models\CathegorieModel;
use App\Models\FournisseurModel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;


class ProduitController extends Controller
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
        $grid = new Grid(new ProduitModel);

        $grid->id('ID');
        $grid->name('Nom');
        $grid->cathegorie('Cathegorie')->display(function($id) {
            return FournisseurModel::find($id)->name;
        });
        $grid->picture('Image');
        $grid->type('type')->display(function($id) {
            return CathegorieModel::find($id)->name;
        });
        $grid->prix_achat('Prix d\'achat');
        $grid->prix_vente('Prix de vente');
        $grid->littre('littre');
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
        $show = new Show(ProduitModel::findOrFail($id));

        $show->id('ID');
        $show->name('name');
        $show->cathegorie('cathegorie')->display(function($id) {
            return FournisseurModel::find($id)->name;
        });
        $show->picture('picture')->image();
        $show->type('type')->display(function($id) {
            return CathegorieModel::find($id)->name;
        });
        $show->prix_achat('prix_achat');
        $show->prix_vente('prix_vente');
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
        $form = new Form(new ProduitModel);

        
        $form->column(1/2,function($form){
       
        $form->text('name', 'name')->rules('required');
        $form->select('cathegorie','cathegorie')->options(FournisseurModel::all()->pluck('name', 'id'))->default(1)->rules('required');
        
        $form->select('type','type')->options(CathegorieModel::all()->pluck('name', 'id'))->default(1)->rules('required');
        $form->currency('prix_achat', 'Prix d\'achat')->symbol('FCFA');
        $form->currency('prix_vente', 'Prix de vente')->symbol('FCFA');
        $form->currency('littre', 'Nombre Littre')->symbol('L')->default(1);
        
        });
        $form->column(1/2,function($form){
            $form->image('picture', 'picture');
            
        });

       

        return $form;
    }
}
