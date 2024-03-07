<?php namespace Visiosoft\RecipesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;
use Composer\Config;

class RecipesModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'recipe' => [
            'buttons' => [
                'new_recipe',
            ],
        ],
        'logs'
    ];
}
