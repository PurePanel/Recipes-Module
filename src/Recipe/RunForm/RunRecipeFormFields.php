<?php namespace Visiosoft\RecipesModule\Recipe\RunForm;


use Illuminate\Support\Str;
use Visiosoft\RecipesModule\Recipe\Commands\RecipeHelper;
use Visiosoft\SiteModule\Site\SiteModel;

class RunRecipeFormFields
{
    public function handle(RunRecipeFormBuilder $builder)
    {
        $fields = [
            'site' => [
                'label' => 'visiosoft.module.recipes::field.select_site.name',
                'type' => 'anomaly.field_type.relationship',
                'required' => true,
                'config' => [
                    'title_name' => 'username',
                    'key_name' => 'site_id',
                    'related' => SiteModel::class,
                    'mode' => 'search'
                ],
            ],
        ];

        $entry = app($builder->getModel())->find($builder->getEntry());

        $dynamicParameters = RecipeHelper::getDynamicParameters($entry);

        $siteParameters = [
            'site_full_path',
            'site_username',
            'site_db_password'
        ];

        foreach ($dynamicParameters as $parameter) {
            if (!in_array($parameter, $siteParameters)) {
                $builder->addDynamicParameter($parameter);
                $fields[$parameter] = [
                    'type' => 'anomaly.field_type.text',
                    'label' => $parameter,
                    'required' => true,
                ];
            }

        }

        $builder->setFields($fields);
    }
}
