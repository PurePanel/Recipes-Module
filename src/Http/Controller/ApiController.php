<?php namespace Visiosoft\RecipesModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Visiosoft\RecipesModule\Http\Request\RunRequest;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeRepositoryInterface;
use Visiosoft\SiteModule\Site\Contract\SiteRepositoryInterface;

class ApiController extends ResourceController
{
    /**
     * @var RecipeRepositoryInterface
     */
    protected $recipe;

    /**
     * @var
     */
    protected $site;

    /**
     * @param RecipeRepositoryInterface $recipe
     * @param SiteRepositoryInterface $site
     */
    public function __construct(RecipeRepositoryInterface $recipe, SiteRepositoryInterface $site)
    {
        $this->recipe = $recipe;
        $this->site = $site;
        parent::__construct();
    }

    /**
     * @param RunRequest $request
     * @return object|\Illuminate\Http\JsonResponse
     */
    public function run(RunRequest $request): object
    {
        try {
            $request->validated();
            $site = $this->site->find($request->get('siteId'));
            $recipe = $this->recipe->find($request->get('recipeId'));

            // Todo: Run createRecipe dispatch

            // Todo: Run logRecipe dispatch
        } catch (\Exception $exception) {
            return $this->response->json([
                'success' => false,
                'message' => trans('streams::error.500.name')
            ]);
        }
    }
}
