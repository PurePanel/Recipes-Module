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
            'siteId' => 'required|integer|exists:site_site,id',
            'recipeId' => 'required|integer|exists:recipes_recipe,id',
        ];
    }
}