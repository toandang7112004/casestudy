<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
            'group_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'email.required' => 'Không được để trống!',
            'password.required' => 'Không được để trống!',
            'group_id.required' => 'Vui lòng chọn chức vụ!',
        ];
    }
}
