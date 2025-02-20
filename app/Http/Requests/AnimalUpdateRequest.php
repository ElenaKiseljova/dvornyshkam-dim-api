<?php

namespace App\Http\Requests;

use App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnimalUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'slug' => ['required', Rule::unique('animals')->ignore($this->route('animal')->id)],
            'category' => ['required', 'string', Rule::in(Animal::CATEGORIES)],
            'gender' => ['required', Rule::in(Animal::GENDERS)],
            'weight' => 'required|numeric',
            'birthday' => 'required|date',
            'image' => 'required|string',
            'images' => 'string|nullable',
            'animal_friendly' => 'required|boolean',
            'vaccinated' => 'required|boolean',
            'description' => 'nullable|string',
        ];
    }

    // https://www.udemy.com/course/laravel-blog-development/learn/lecture/34779478
    protected function prepareForValidation()
    {
        $this->merge([
            'images' => is_array($this->images) && count($this->images) ? implode(', ', $this->images) : null,
        ]);
    }
}
