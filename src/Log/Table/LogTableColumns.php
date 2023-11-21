<?php namespace Visiosoft\RecipesModule\Log\Table;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

class LogTableColumns
{
    public function handle(LogTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'site' => [
                    'value' => 'entry.site.username'
                ],
                'recipe' => [
                    'value' => 'entry.recipe.name'
                ],
                'created_at' => [
                    'value' => function (EntryInterface $entry) {
                        return $entry->created_at->timezone(config('streams::timezone','Europe/Istanbul'))->format('d/m/Y H:i:s');
                    }
                ]
            ]
        );
    }
}
