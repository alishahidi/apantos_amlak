<?php

namespace App\Http\Requests\Auth;

use System\Request\Request;

class ResetPasswordRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "password" => "required|min:8|confirmed",
                "captcha" => "required|captcha",
            ],
            "errors" => [
                "password" => "required!پسورد باید وارد شود.|min!پسورد حداقل باید ۸ حرف باشد.|confirmed!پسورد ها باید یکسان باشند.",
                "captcha" => "required!کد امنیتی باید وارد شود.|captcha!کد امنیتی اشتباه است.",
            ]
        ];
    }
}
