<?php namespace Visiosoft\RecipesModule\Log;

use Visiosoft\RecipesModule\Log\Contract\LogInterface;
use Anomaly\Streams\Platform\Model\Recipes\RecipesLogsEntryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogModel extends RecipesLogsEntryModel implements LogInterface
{
    use HasFactory;

    /**
     * @return LogFactory
     */
    protected static function newFactory()
    {
        return LogFactory::new();
    }
}
