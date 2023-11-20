<?php namespace Visiosoft\RecipesModule\Recipe\RunForm;

class RunRecipeFormHandler
{
    public function handle(RunRecipeFormBuilder $builder)
    {
        if (!$builder->canSave()) {
            return;
        }

        // Todo: Create dispatch createRecipe and use here

        // Todo: Create dispatch logRecipe and use here
    }
}
