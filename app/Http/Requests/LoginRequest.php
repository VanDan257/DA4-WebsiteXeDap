<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'CusName' => 'required|min:6',
            'Email' => 'required|email',
            'Password' => 'required|min:6',
        ];
    }

    public function messages(){
        return [
            'CusName.min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'CusName.required' => 'Vui lòng nhập :attribute',
            'Password.min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'Password.required' => 'Vui lòng nhập :attribute',
            'Email.email' => 'Trường :attribute phải là 1 địa chỉ email',
            'Email.required' => 'Vui lòng nhập :attribute'
        ];
    }

    public function attributes(){
        return[
            'CusName' => 'họ và tên',
            'Email' => 'email',
            'Password' => 'mật khẩu'
        ];
    }
    
    public function withValidator($validator){
        $validator->after(function ($validator){
            if ($validator->errors()->count()>0){
                $validator->errors()->add('msg', 'Đăng kí không thành công!');
            }
        });
    }
}
