<?php namespace Visiosoft\RecipesModule;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Visiosoft\RecipesModule\Recipe\RecipeModel;

class RecipesModuleSeeder extends Seeder
{
    public function run()
    {
        RecipeModel::query()->create([
            'name' => 'create openclassify',
            'recipe_key' => 'create-openclassify',
            'commands' => "cd {site_full_path}
                            sudo rm -rf {site_full_path}/*
                            sudo git clone https://github.com/openclassify/openclassify {site_full_path}
                            cd {site_full_path} && sudo php7.4 -d memory_limit=-1 `which composer` update
                            sudo cp {site_full_path}/.env.example {site_full_path}/.env
                            cd {site_full_path} && sudo php7.4 artisan env:set DB_DATABASE={site_username}
                            cd {site_full_path} && sudo php7.4 artisan env:set DB_USERNAME={site_username}
                            cd {site_full_path} && sudo php7.4 artisan env:set DB_PASSWORD={site_db_password}
                            cd {site_full_path} && sudo php7.4 artisan env:set ADMIN_USERNAME=admin
                            cd {site_full_path} && sudo php7.4 artisan env:set ADMIN_EMAIL=admin@example.com
                            cd {site_full_path} && sudo php7.4 artisan env:set ADMIN_PASSWORD=admin123
                            cd {site_full_path} && sudo php7.4 artisan env:set AUTO_TOKEN=openssl rand -base64 32|sha256sum|base64|head -c 32| tr '[:upper:]' '[:lower:]'
                            cd {site_full_path} && sudo php7.4 artisan install --ready"
        ]);
    }
}
