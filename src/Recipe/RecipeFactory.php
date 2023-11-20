<?php namespace Visiosoft\RecipesModule\Recipe;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var RecipeModel
     */
    protected $model = RecipeModel::class;


    /**
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [];
    }
}
