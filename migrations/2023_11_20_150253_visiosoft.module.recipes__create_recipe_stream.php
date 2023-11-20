<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class VisiosoftModuleRecipesCreateRecipeStream extends Migration
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
        'slug' => 'recipe',
        'title_column' => 'name',
        'translatable' => false,
        'versionable' => false,
        'trashable' => true,
        'searchable' => false,
        'sortable' => false,
    ];

    protected $fields = [
        'name' => 'anomaly.field_type.text',
        'recipe_key' => [
            'type' => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type' => '-'
            ],
        ],
        "commands" => [
            "type"   => "anomaly.field_type.editor",
            "config" => [
                "mode"          => "shell",
                "height"        => 500,
            ]
        ],
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'required' => true,
        ],
        'recipe_key' => [
            'unique' => true,
            'required' => true,
        ],
        'commands'
    ];

}
