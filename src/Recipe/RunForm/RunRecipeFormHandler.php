<?php namespace Visiosoft\RecipesModule\Recipe\RunForm;

use Carbon\Carbon;
use Visiosoft\SiteModule\Helpers\Log;
use Visiosoft\RecipesModule\Recipe\Jobs\RunRecipe;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeRepositoryInterface;
use Visiosoft\SiteModule\Site\Contract\SiteRepositoryInterface;

class RunRecipeFormHandler
{
    /**
     * @param RunRecipeFormBuilder $builder
     * @param SiteRepositoryInterface $site
     * @param RecipeRepositoryInterface $recipe
     * @return void
     */
    public function handle(
        RunRecipeFormBuilder      $builder,
        SiteRepositoryInterface   $site,
        RecipeRepositoryInterface $recipe
    )
    {
        /**
         * Check Form Validation
         */
        if (!$builder->canSave()) {
            return;
        }

        /**
         * Set Variables before Run Dispatch
         */
        $site = $site->getSiteBySiteId($builder->getPostValue('site'));
        $recipe = $recipe->findByKey($builder->getPostValue('recipe'));

        $dynamicValues = array();

        foreach ($builder->dynamicParameters as $parameter) {
            $dynamicValues[$parameter] = $builder->getPostValue($parameter);
        }

        /**
         * Run Recipe
         */
        try {
            RunRecipe::dispatch($site, $recipe, $dynamicValues)->delay(Carbon::now()->addSeconds(3));
        } catch (\Exception $e) {
            (new Log())->createLog('error_run_recipe', $e);
        }
    }
}
