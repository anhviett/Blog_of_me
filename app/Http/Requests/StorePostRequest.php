<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'Vui lòng nhập Họ',
            'lastname.required' => 'Vui lòng nhập Tên',
            'email.email' => 'Định dạng sai',
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Vui lòng nhập 6 kí tự trở lên',
            'password.confirmed' => 'Mật khẩu không giống nhau',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không giống nhau'
        ];


    }
}
