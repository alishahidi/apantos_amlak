<?php

namespace App\Http\Requests\Auth;

use System\Request\Request;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "first_name" => "required|max:191",
                "last_name" => "required|max:191",
                "email" => "required|max:90|email|unique:users,email",
                "avatar" => "required|file|mimes:jpeg,jpg,png,gif|max:2048",
                "password" => "required|min:8|confirmed",
                "captcha" => "required|captcha",
            ],
            "errors" => [
                "first_name" => "required!نام باید وارد شود.|max!نام باید کمتر از ۱۹۱ حرف باشد.",
                "last_name" => "required!نام خانوادگی باید وارد شود.|max!نام خانوادگی باید کمتر از ۱۹۱ حرف باشد.",
                "email" => "required!ایمیل باید وارد شود.|max!ایمیل باید کمتر از ۹۰ حرف باشد.|email!ایمیل معتبر نمیباشد|unique!ایمیل تکراری است.",
                "avatar" => "required!تصویر باید انتخاب شود.|file!تصویر باید فایل باشد.|mimes!نوع عکس ارسالی معتبر نمیباشد.|max!عکس حداکثر باید ۲ مگابایت باشد.",
                "password" => "required!پسورد باید وارد شود.|min!پسورد حداقل باید ۸ حرف باشد.|confirmed!پسورد ها باید یکسان باشند.",
                "captcha" => "required!کد امنیتی باید وارد شود.|captcha!کد امنیتی اشتباه است.",
            ]
        ];
    }
}
