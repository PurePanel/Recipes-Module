<?php namespace Visiosoft\RecipesModule\Recipe\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

interface RecipeInterface extends EntryInterface
{
    public function getCommands();
}
