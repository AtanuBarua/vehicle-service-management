<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'regular_price' => 'required',
            'stock' => 'required',
            'availability' => 'required',
            'status' => 'required'
        ];

        if ($this->method() == "PUT") {
            if (empty($this->input('image'))) {
                unset($rules['image']);
            }
        }
        return $rules;
    }
}
