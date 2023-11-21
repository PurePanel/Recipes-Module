<?php namespace Visiosoft\RecipesModule\Recipe\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

interface RecipeRepositoryInterface extends EntryRepositoryInterface
{
    public function findByKey($key);
}
