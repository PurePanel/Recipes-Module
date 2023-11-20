<?php namespace Visiosoft\RecipesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Visiosoft\RecipesModule\Recipe\Contract\RecipeRepositoryInterface;
use Visiosoft\RecipesModule\Recipe\RecipeRepository;
use Anomaly\Streams\Platform\Model\Recipes\RecipesRecipeEntryModel;
use Visiosoft\RecipesModule\Recipe\RecipeModel;
use Illuminate\Routing\Router;

class RecipesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [
        'admin/recipes'           => 'Visiosoft\RecipesModule\Http\Controller\Admin\RecipeController@index',
        'admin/recipes/create'    => 'Visiosoft\RecipesModule\Http\Controller\Admin\RecipeController@create',
        'admin/recipes/edit/{id}' => 'Visiosoft\RecipesModule\Http\Controller\Admin\RecipeController@edit',
    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [
        //Visiosoft\RecipesModule\Http\Middleware\ExampleMiddleware::class
    ];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Visiosoft\RecipesModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        //Visiosoft\RecipesModule\Event\ExampleEvent::class => [
        //    Visiosoft\RecipesModule\Listener\ExampleListener::class,
        //],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Visiosoft\RecipesModule\Example::class
    ];

    /**
     * The addon class bindings.
     *
     * @type array|null
     */
    protected $bindings = [
        RecipesRecipeEntryModel::class => RecipeModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        RecipeRepositoryInterface::class => RecipeRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {

        \config()->set('anomaly.field_type.editor::editor.modes.shell',[
            'extension' => 'shell',
            'name'      => 'Shell',
            'loader'    => 'shell',
            'styles'    => [],
            'scripts'   => [
                'anomaly.field_type.editor::js/codemirror/mode/shell/shell.js',
            ],
        ]);

        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        // Register dynamic routes here for example.
        // Use method injection or commands to bring in services.
    }


}
