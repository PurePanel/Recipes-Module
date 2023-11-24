<?php namespace Visiosoft\RecipesModule\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RunRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'siteId' => 'required|string|exists:site_site,site_id',
            'recipeKey' => 'required|string|exists:recipes_recipe,recipe_key',
        ];
    }
}