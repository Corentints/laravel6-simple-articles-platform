<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'slug' => Str::slug($this->slug ?? $this->name)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'name' => 'required|unique:categories',
            //'slug' => 'required|unique:categories'
           // 'name' => 'required|unique:categories, id, ' . (optional($this->category)->id ?: 'NULL'),
            'name' => 'required',
           'slug' => 'unique:categories,slug, ' . (optional($this->category)->id ?: 'NULL')
        ];
    }
}
