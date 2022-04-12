<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class SlideRequest extends Request
{
    public function rules()
    {
        if (methodField() == "put")
            return [
                "rules" => [
                    "title" => "required|max:191",
                    "url" => "required|max:191",
                    "amount" => "max:191",
                    "address" => "max:191",
                    "body" => "required",
                    "image" => "file|mimes:jpeg,jpg,png,gif",
                ],
                "errors" => [
                    "title" => "required!عنوان سلاید باید وارد شود.|max!عنوان حداکثر باید ۱۹۱ حرف باشد.",
                    "url" => "required!لینک باید وارد شود.|max!لینک حداکثر باید ۱۹۱ حرف باشد.",
                    "amount" => "max!مبلغ حداکثر باید ۱۹۱ حرف باشد.",
                    "address" => "max!آدرس حداکثر باید ۱۹۱ حرف باشد.",
                    "image" => "mimes!نوع عکس ارسالی اشتباه است.",
                ]
            ];

        return [
            "rules" => [
                "title" => "required|max:191",
                "url" => "required|max:191",
                "amount" => "max:191",
                "address" => "max:191",
                "body" => "required",
                "image" => "required|file|mimes:jpeg,jpg,png,gif",
            ],
            "errors" => [
                "title" => "required!عنوان سلاید باید وارد شود.|max!عنوان حداکثر باید ۱۹۱ حرف باشد.",
                "url" => "required!لینک باید وارد شود.|max!لینک حداکثر باید ۱۹۱ حرف باشد.",
                "amount" => "max!مبلغ حداکثر باید ۱۹۱ حرف باشد.",
                "address" => "max!آدرس حداکثر باید ۱۹۱ حرف باشد.",
                "image" => "required!عکس باید وارد شود.|mimes!نوع عکس ارسالی اشتباه است.",
            ]
        ];
    }
}
