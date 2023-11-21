<?php namespace Visiosoft\RecipesModule\Log\Command;

use Visiosoft\RecipesModule\Log\Contract\LogRepositoryInterface;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeInterface;
use Visiosoft\SiteModule\Site\Contract\SiteInterface;

class CreateLog
{
    /**
     * @var SiteInterface
     */
    protected SiteInterface $site;

    /**
     * @var RecipeInterface
     */
    protected RecipeInterface $recipe;

    /**
     * @var string
     */
    protected string $response;

    /**
     * @param RecipeInterface $recipe
     * @param SiteInterface $site
     * @param string $response
     */
    public function __construct(RecipeInterface $recipe, SiteInterface $site, string $response)
    {
        $this->site = $site;
        $this->recipe = $recipe;
        $this->response = $response;
    }

    public function save()
    {
        $log = app(LogRepositoryInterface::class)->newQuery()->create([
            'site' => $this->site,
            'recipe' => $this->recipe,
            'response' => $this->response
        ]);

        return $log;
    }
}
