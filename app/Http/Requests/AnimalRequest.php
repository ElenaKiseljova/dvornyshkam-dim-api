<?php

namespace App\Http\Requests;

use App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'slug' => 'nullable|string|unique',
            //   'website' => 'nullable|url',
            //   'address' => 'nullable|string|max:255',
            'category' => ['required', Rule::enum(Animal::CATEGORIES)],
            'gender' => ['required', Rule::enum(Animal::GENDERS)],
            'weight' => 'required|decimal',
            'birthday' => 'required|date',
            'image' => 'nullable|string',
            'images' => 'array',
            'images.*' => 'string',
            'animal_friendly' => 'required|boolean',
            'vaccinated' => 'required|boolean',
            'description' => 'nullable|string',
        ];
    }

    // https://www.udemy.com/course/laravel-blog-development/learn/lecture/34779478
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->name && !$this->slug ? Str::slug($this->name) : $this->slug,
        ]);
    }
}
