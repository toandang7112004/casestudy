<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopPostRequest extends FormRequest
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
            'address' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên không được để trống!',
            'address.required' => 'Địa chỉ không được để trống!',
            'email.required' => 'Email không được để trống!',
            'password.required' => 'Password không được để trống!',
            'password.min' => 'Password quá ngắn!'
        ];
    }
}
