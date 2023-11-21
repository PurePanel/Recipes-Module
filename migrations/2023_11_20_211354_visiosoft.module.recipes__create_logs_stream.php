<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class VisiosoftModuleRecipesCreateLogsStream extends Migration
{

    /**
     * This migration creates the stream.
     * It should be deleted on rollback.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'logs',
        'title_column' => 'id',
        'translatable' => false,
        'versionable' => false,
        'trashable' => true,
        'searchable' => false,
        'sortable' => false,
    ];

    protected $fields = [
        'recipe' => [
            'type' => 'anomaly.field_type.relationship',
            'config' => [
                'related' => \Visiosoft\RecipesModule\Recipe\RecipeModel::class,
            ],
        ],
        'site' => [
            'type' => 'anomaly.field_type.relationship',
            'config' => [
                'related' => \Visiosoft\SiteModule\Site\SiteModel::class
            ],
        ],
        'success' => 'anomaly.field_type.boolean',
        'response' => 'anomaly.field_type.textarea'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'recipe' => [
            'required' => true,
        ],
        'site' => [
            'required' => true,
        ],
        'success',
        'response'
    ];
}
