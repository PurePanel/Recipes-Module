<?php namespace Visiosoft\RecipesModule\Recipe\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class RecipeTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'filter' => 'search',
            'fields' => [
                'name',
                'recipe_key',
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'name',
        'recipe_key'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'run' => [
            'href' => '/admin/recipes/run/{entry.id}',
            'type' => 'info',
            'icon' => 'fa fa-play'
        ],
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'order_by' => [
            'id' => 'DESC'
        ],
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
