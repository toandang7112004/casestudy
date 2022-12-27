<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'price.required' => 'Vui lòng nhập giá!',
            'category_id.required' => 'Vui lòng nhập tên loại!',
            'image.required' => 'Vui lòng nhập ảnh!',
            'description.required' => 'Vui lòng nhập mô tả!',
        ];
    }
}
