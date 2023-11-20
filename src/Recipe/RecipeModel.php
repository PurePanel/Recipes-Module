<?php namespace Visiosoft\RecipesModule\Recipe;

use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;
use Anomaly\Streams\Platform\Model\Recipes\RecipesRecipeEntryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeModel extends RecipesRecipeEntryModel implements RecipeInterface
{
    use HasFactory;

    /**
     * @return RecipeFactory
     */
    protected static function newFactory()
    {
        return RecipeFactory::new();
    }
}
