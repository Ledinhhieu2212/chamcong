<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'image' => 'required',
            'job' => 'required',
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
            'image.required' => 'Bạn chưa gửi ảnh',
            'job.required' => 'Bạn chưa chọn công việc',
        ];
    }
}
