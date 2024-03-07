<?php namespace Visiosoft\RecipesModule\Recipe\Commands;

use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;

class RecipeHelper
{
    public static function getDynamicParameters(RecipeInterface $recipe)
    {
        $commands = $recipe->getCommands();

        preg_match_all('/\{(.*?)\}/', $commands, $matches);

        return $matches[1];
    }
}