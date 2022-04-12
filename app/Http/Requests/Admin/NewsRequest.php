<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class NewsRequest extends Request
{
    public function rules()
    {
        if (methodField() == "put")
            return [
                "rules" => [
                    "title" => "required|max:191",
                    "body" => "required",
                    "cat_id" => "required|exists:categories,id",
                    "image" => "file|mimes:jpeg,jpg,png,gif",
                    "published_at" => "required|date"
                ],
                "errors" => [
                    "title" => "required!تیتر خبر باید وارد شود.|max!تیتر باید از ۱۹۱ حرف کمتر باشد.",
                    "body" => "required!متن خبر باید وارد شود.",
                    "cat_id" => "required!باید دسته بندی را انتخاب کنید.|exists!چنین دسته بندی وجود ندارد.",
                    "image" => "mimes!نوع عکس ارسالی غلط است.",
                    "published_at" => "required!تاریخ انتشار باید وارد شود.|date!باید فرمت وارد شده تاریخ باشد"
                ]
            ];

        return [
            "rules" => [
                "title" => "required|max:191",
                "body" => "required",
                "cat_id" => "required|exists:categories,id",
                "image" => "required|file|mimes:jpeg,jpg,png,gif",
                "published_at" => "required|date"
            ],
            "errors" => [
                "title" => "required!تیتر خبر باید وارد شود.|max!تیتر باید از ۱۹۱ حرف کمتر باشد.",
                "body" => "required!متن خبر باید وارد شود.",
                "cat_id" => "required!باید دسته بندی را انتخاب کنید.|exists!چنین دسته بندی وجود ندارد.",
                "image" => "mimes!نوع عکس ارسالی غلط است.|required!عکس باید انتخاب شود.",
                "published_at" => "required!تاریخ انتشار باید وارد شود.|date!باید فرمت وارد شده تاریخ باشد"
            ]
        ];
    }
}
