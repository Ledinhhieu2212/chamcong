<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => 'required|email|string|unique:users',
            'username'=>'required|string|unique:users',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
            'phone' => 'required|string|min:7|max:10',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Chưa đúng định dạng email',
            'email.unique' => 'Email đã tồn tại. Hãy chọn email khác',
            'email.string' => 'Email phải là ký tự',
            'username.required'=> 'Bạn chưa nhập tên tài khoản',
            'username.unique'=> 'Tên tài khoản đã tồn tại',
            'password.required' =>  'Bạn chưa nhập mật khẩu',
            're_password.required' =>  'Bạn chưa nhập lại mật khẩu',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
        ];
    }
}
