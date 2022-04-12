<?php

namespace App\Http\Requests\Auth;

use System\Request\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "email" => "required|email",
                "password" => "required",
                "captcha" => "required|captcha",
            ],
            "errors" => [
                "email" => "required!ایمیل باید وارد شود.|email!ایمیل وارد شده معتبر نمیباشد.",
                "password" => "required!پسورد باید وارد شود.",
                "captcha" => "required!کد امنیتی باید وارد شود.|captcha!کد امنیتی اشتباه است.",
            ]
        ];
    }
}
