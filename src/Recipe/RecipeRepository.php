<?php namespace Visiosoft\RecipesModule\Recipe;

use Visiosoft\RecipesModule\Recipe\Contract\RecipeRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class RecipeRepository extends EntryRepository implements RecipeRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var RecipeModel
     */
    protected $model;

    /**
     * Create a new RecipeRepository instance.
     *
     * @param RecipeModel $model
     */
    public function __construct(RecipeModel $model)
    {
        $this->model = $model;
    }
}
