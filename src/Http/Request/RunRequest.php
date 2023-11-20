<?php namespace Visiosoft\RecipesModule\Http\Request;

use Illuminate\Contracts\Validation\Validator;
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

    /**
     * @param Validator $validator
     * @return Validator
     */
    protected function failedValidation(Validator $validator): object
    {
        return $this->validator = $validator;
    }

    public function rules(): array
    {
        return [
            'siteId' => 'required|integer|exists:site_site,id',
            'recipeId' => 'required|integer|exists:recipes_recipe,id',
        ];
    }
}