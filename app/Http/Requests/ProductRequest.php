<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'Title' => 'required|min:6',
            'Price' => 'required|integer',
            'Amount' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'Title.required' => 'Vui lòng nhập :attribute',
            'Title.min' => ':attribute không được nhỏ hơn :min ký tự',
            'Price.required' => 'Vui lòng nhập :attribute',
            'Amount.required' => 'Vui lòng nhập :attribute',
            'Amount.integer' => ':attribute sản phẩm phải là số',
            'Price.integer' => ':attribute sản phẩm phải là số'
        ];
    }

    public function attributes()
    {
        return [
            'Title' => 'tiêu đề sản phẩm',
            'Price' => 'giá sản phẩm',
            'Amount' => 'số lượng sản phẩm'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra! Vui lòng kiểm tra lại!');
            }
        });
    }

    // public function prepareForValidation(){
    //     $this->merge([
    //         'create_at'=> date('Y-m-d H:i:s')
    //     ]);
    // }

    protected function failedAuthorization()
    {
        throw new AuthorizationException('Quay lại trang chủ');
    }

}