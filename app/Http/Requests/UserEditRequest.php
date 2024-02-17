<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'email' => 'required|email|string',
            'username'=>'required|string',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Chưa đúng định dạng email',
            'email.string' => 'Email phải là ký tự',
            'username.required'=> 'Bạn chưa nhập tên tài khoản',
            'password.required' =>  'Bạn chưa nhập mật khẩu',
            're_password.required' =>  'Bạn chưa nhập lại mật khẩu',
        ];
    }
}
