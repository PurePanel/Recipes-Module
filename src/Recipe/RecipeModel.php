<?php namespace Visiosoft\RecipesModule\Recipe;

use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;
use Anomaly\Streams\Platform\Model\Recipes\RecipesRecipeEntryModel;

class RecipeModel extends RecipesRecipeEntryModel implements RecipeInterface
{
    /**
     * @return string
     */
    public function getCommands(): string
    {
        return $this->commands;
    }

    /**
     * @return string
     */
    public function getRecipeKey(): string
    {
        return $this->recipe_key;
    }
}
