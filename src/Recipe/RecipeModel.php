<?php namespace Visiosoft\RecipesModule\Recipe;

use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;
use Anomaly\Streams\Platform\Model\Recipes\RecipesRecipeEntryModel;

class RecipeModel extends RecipesRecipeEntryModel implements RecipeInterface
{
    public function getCommands()
    {
        return $this->commands;
    }
}
