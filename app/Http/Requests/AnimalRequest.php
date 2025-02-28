<?php

namespace App\Http\Requests;

use App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AnimalRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:50',
            'slug' => ['required', 'string', Rule::unique('animals', 'slug')],
            'category' => ['required', Rule::in(Animal::CATEGORIES)],
            'gender' => ['required', Rule::in(Animal::GENDERS)],
            'weight' => 'required|numeric',
            'birthday' => 'required|date',
            'image' => 'nullable|image',
            'images' => 'nullable|array',
            'images*' => 'image',
            'animal_friendly' => 'required|boolean',
            'vaccinated' => 'required|boolean',
            'description' => 'nullable|string',
        ];

        if ($this->method() === 'PUT') {
            $rules['slug'] = ['required', 'string', Rule::unique('animals', 'slug')->ignore($this->route('animal')->id)];
        }

        return $rules;
    }

    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         // ---
    //     ]);
    // }

    public function getData()
    {
        $data = $this->validated();

        if ($this->hasFile('image')) {
            $directory = Animal::makeDirectory();

            $data['image'] = $this->image->store($directory);
        }

        if (is_array($this->images)) {
            $data['images'] = null; // TO DO: store images
        }

        return $data;
    }
}
