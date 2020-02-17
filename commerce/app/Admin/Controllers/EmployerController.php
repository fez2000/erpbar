<?php

namespace App\Admin\Controllers;

use App\Models\EmployerModel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\PosteModel;
use Encore\Admin\Auth\Database\Administrator;


class EmployerController extends Controller
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
        $grid = new Grid(new EmployerModel);

        $grid->id('ID');
        $grid->nom('nom');
        $grid->image('image');
        $grid->poste('poste')->display(function($id) {
            return PosteModel::find($id)->name;
        });
        $grid->telephone('telephone');
        $grid->compte('compte');
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
        $show = new Show(EmployerModel::findOrFail($id));

        $show->id('ID');
        $show->nom('nom');
        $show->image('image')->image();
        $show->poste('poste')->display(function($id) {
            return PosteModel::find($id)->name;
        });
        $show->telephone('telephone');
        $show->compte('compte');
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
        $form = new Form(new EmployerModel);

        $form->display('ID');
        $form->text('nom', 'nom');
        $form->text('image', 'image');
        $form->select('poste','poste')->options(PosteModel::all()->pluck('name', 'id'))->default(1)->rules('required');
        $form->mobile('telephone', 'telephone');
        $form->select('compte','compte')->options(Administrator::all()->pluck('name', 'id'));
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
