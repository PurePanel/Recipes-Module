<?php namespace Visiosoft\RecipesModule\Recipe\RunForm;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Visiosoft\RecipesModule\Recipe\RecipeModel;
use Visiosoft\SiteModule\Site\SiteModel;

class RunRecipeFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        'site' => [
            'label' => 'visiosoft.module.recipes::field.select_site.name',
            'type' => 'anomaly.field_type.relationship',
            'required' => true,
            'config' => [
                'related' => SiteModel::class,
                'mode' => 'search'
            ],
        ],
        'recipe' => [
            'label' => 'visiosoft.module.recipes::field.select_recipe.name',
            'type' => 'anomaly.field_type.relationship',
            'required' => true,
            'config' => [
                'related' => RecipeModel::class,
                'mode' => 'search'
            ],
        ],
    ];

    /**
     * Additional validation rules.
     *
     * @var array|string
     */
    protected $rules = [];

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [
        'run' => [
            'text' => 'visiosoft.module.recipes::button.run_recipe',
            'type' => 'info',
            'icon' => 'fa fa-play'
        ],
    ];

    /**
     * The form buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'cancel',
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [];

}
