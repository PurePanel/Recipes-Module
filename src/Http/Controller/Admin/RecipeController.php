<?php namespace Visiosoft\RecipesModule\Http\Controller\Admin;

use Visiosoft\RecipesModule\Recipe\Form\RecipeFormBuilder;
use Visiosoft\RecipesModule\Recipe\RunForm\RunRecipeFormBuilder;
use Visiosoft\RecipesModule\Recipe\Table\RecipeTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class RecipeController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param RecipeTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(RecipeTableBuilder $table)
    {
//        dd(config()->get('anomaly.field_type.editor::editor.modes'));
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param RecipeFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(RecipeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param RecipeFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(RecipeFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * @param RunRecipeFormBuilder $builder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function run(RunRecipeFormBuilder $builder)
    {
        return $builder->render();
    }
}
