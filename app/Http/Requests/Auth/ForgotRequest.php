<?php

namespace App\Http\Requests\Auth;

use System\Request\Request;

class ForgotRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "email" => "required|email|exists:users,email",
            ],
            "errors" => [
                "email" => "required!ایمیل باید وارد شود.|email!ایمیل وارد شده معتبر نمیباشد.|exists!چنین ایمیلی در دیتابیس وجود ندارد.",
            ]
        ];
    }
}
