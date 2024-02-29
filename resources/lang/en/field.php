<?php

return [
    'name' => [
        'name' => 'Name',
    ],
    'recipe_key' => [
        'name' => 'Recipe Key',
    ],
    'commands' => [
        'name' => 'Help',
        'warning' => 'Please use <b>fullPath</b> for directory operations.',
        'instructions' => '<b>Command List:</b><br><ul>
            <li>How to use Full Path<i> (mkdir <u>/home/username/web</u>/example)</i> : <code>mkdir {site_full_path}/example</code></li>
            </ul>
            <b>How to add dynamic parameters;</b><br>
            <p>It is defined as the variable you put in curly brackets, and if there is a parameter equivalent, it is updated with the required value.</p>
            Eq:<code>php artisan make:{type}</code>. When we send the <code>migration</code>, the value is updated. <code>php artisan make:migration</code>',
    ],
    'select_site' => [
        'name' => 'Select Site',
    ],
    'select_recipe' => [
        'name' => 'Select Recipe'
    ],
    'site' => [
        'name' => 'Site'
    ],
    'recipe' => [
        'name' => 'Recipe'
    ],
    'success' => [
        'name' => 'Success'
    ],
    'response' => [
        'name' => 'Response'
    ],
];
