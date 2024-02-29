<?php namespace Visiosoft\RecipesModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Carbon\Carbon;
use Visiosoft\RecipesModule\Http\Request\RunRequest;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeRepositoryInterface;
use Visiosoft\RecipesModule\Recipe\Jobs\RunRecipe;
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
     * Return recipes list
     * @return object|\Illuminate\Http\JsonResponse
     */
    public function index(): object
    {
        try {
            $recipes = $this->recipe->all()->pluck('recipe_key', 'id')->all();

            return response()->json([
                'success' => true,
                'data' => $recipes,
            ]);
        } catch (\Exception $exception) {
            return $this->response->json([
                'success' => false,
                'message' => trans('streams::error.500.name'),
                'errors' => [trans('streams::error.500.name')]
            ], 500);
        }
    }

    /**
     * @param RunRequest $request
     * @return object|\Illuminate\Http\JsonResponse
     */
    public function run(RunRequest $request): object
    {
        try {
            $request->validated();
            $site = $this->site->findBy('site_id', $request->get('siteId'));
            $recipe = $this->recipe->findBy('recipe_key', $request->get('recipeKey'));

            $dynamicParameters = array_filter($this->request->all(), function ($k) {
                return !in_array($k, ['siteId', 'recipeKey']);
            }, ARRAY_FILTER_USE_KEY);

            RunRecipe::dispatch($site, $recipe, $dynamicParameters)->delay(Carbon::now()->addSeconds(10));

            return response()->json([
                'success' => true,
                'recipe_key' => $recipe->getRecipeKey()
            ], 201);

        } catch (\Exception $exception) {
            return $this->response->json([
                'success' => false,
                'message' => trans('streams::error.500.name'),
                'errors' => [trans('streams::error.500.name')]
            ]);
        }
    }
}
