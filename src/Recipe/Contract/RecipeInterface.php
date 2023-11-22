<?php namespace Visiosoft\RecipesModule\Recipe\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

interface RecipeInterface extends EntryInterface
{
    /**
     * @return string
     */
    public function getCommands(): string;

    /**
     * @return string
     */
    public function getRecipeKey(): string;
}
