<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ture;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    // バリデーション設定メソッド(ルール記載)
    public function rules()
    {
        return [
            // user_name:入力必須、20文字以内
            'username' => ['required', 'max:20'],
            // email:入力必須、メール形式
            'email' => ['required', 'email'],
            // 入力必須、8文字以上、「パスワード」との重複のみ可
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    // バリデーションエラーメッセージ
    public function messages()
     {
         return [
            'username.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは８文字以上で入力してください',
            'password.confirmed' => 'パスワードと一致しません'
         ];
     }
}
