<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class AdsRequest extends Request
{
    public function rules()
    {
        if (methodField() == "put")
            return [
                "rules" => [
                    "title" => "required|max:191",
                    "description" => "required|max:1000",
                    "address" => "required|max:200",
                    "amount" => "required|max:191",
                    "image" => "file|mimes:jpeg,jpg,png,gif",
                    "floor" => "required|max:191",
                    "year" => "required|number",
                    "area" => "required|number",
                    "room" => "required|number",
                    "storeroom" => "required|number",
                    "balcony" => "required|number",
                    "parking" => "required|number",
                    "toilet" => "required|max:191",
                    "tag" => "required|max:191",
                    "cat_id" => "required|exists:categories,id",
                    "sell_status" => "required|number",
                    "type" => "required|number",
                ],
                "errors" => [
                    "title" => "required!عنوان باید وارد شود.|max!عنوان حداکثر باید ۱۹۱ حرف باشد.",
                    "description" => "required!توضیحات باید وارد شود.|max!توضیحات حداکثر باید ۱۰۰۰ حرف باشد.",
                    "address" => "required!آدرس باید وارد شود.|max!آدرس حداکثر باید ۲۰۰ حرف باشد.",
                    "amount" => "required!مبلغ باید وارد شود.|max!مبلغ حداکثر باید ۲۰۰ حرف باشد.",
                    "image" => "mimes!نوع عکس ارسالی غلط است.",
                    "floor" => "required!طبقه باید وارد شود.|max!طبقه باید حداکثر ۱۹۱ حرف باشد.",
                    "year" => "required!سال باید وارد شود.|number!سال باید عدد باشد.",
                    "area" => "required!متراژ باید وارد شود.|number!متراژ باید عدد باشد.",
                    "room" => "required!تعداد اتاق باید وارد شود.|number!تعداد اتاق باید عدد باشد.",
                    "storeroom" => "required!انباری باید وارد شود.|number!انباری باید عدد باشد.",
                    "balcony" => "required!بالکن باید وارد شود.|number!باید باید عدد باشد.",
                    "parking" => "required!پارکینگ باید وارد شود.|number!پارکینگ باید عدد باشد.",
                    "toilet" => "required!توالت باید وارد شود.|max!توالت حداکثر باید ۱۹۱ حرف باشد.",
                    "tag" => "required!تگ باید وارد شود.|max!تگ حداکثر باید ۱۹۱ حرف باشد.",
                    "cat_id" => "required!باید دسته بندی را انتخاب کنید.|exists!چنین دسته بندی وجود ندارد.",
                    "sell_status" => "required!وضعیت خرید یا فروش باید وارد شود.|number!وضعیت خرید و فروش باید عدد باشد.(انتخاب توسط سیستم)",
                    "type" => "required!نوع باید وارد شود.|number!نوع باید عدد باشد.(انتخاب توسط سیستم)",
                ]
            ];

        return [
            "rules" => [
                "title" => "required|max:191",
                "description" => "required|max:1000",
                "address" => "required|max:200",
                "amount" => "required|max:191",
                "image" => "required|file|mimes:jpeg,jpg,png,gif",
                "floor" => "required|max:191",
                "year" => "required|number",
                "area" => "required|number",
                "room" => "required|number",
                "storeroom" => "required|number",
                "balcony" => "required|number",
                "parking" => "required|number",
                "toilet" => "required|max:191",
                "tag" => "required|max:191",
                "cat_id" => "required|exists:categories,id",
                "sell_status" => "required|number",
                "type" => "required|number",
            ],
            "errors" => [
                "title" => "required!عنوان باید وارد شود.|max!عنوان حداکثر باید ۱۹۱ حرف باشد.",
                "description" => "required!توضیحات باید وارد شود.|max!توضیحات حداکثر باید ۱۰۰۰ حرف باشد.",
                "address" => "required!آدرس باید وارد شود.|max!آدرس حداکثر باید ۲۰۰ حرف باشد.",
                "amount" => "required!مبلغ باید وارد شود.|max!مبلغ حداکثر باید ۲۰۰ حرف باشد.",
                "image" => "required!عکس باید وارد شود.|mimes!نوع عکس ارسالی غلط است.",
                "floor" => "required!طبقه باید وارد شود.|max!طبقه باید حداکثر ۱۹۱ حرف باشد.",
                "year" => "required!سال باید وارد شود.|number!سال باید عدد باشد.",
                "area" => "required!متراژ باید وارد شود.|number!متراژ باید عدد باشد.",
                "room" => "required!تعداد اتاق باید وارد شود.|number!تعداد اتاق باید عدد باشد.",
                "storeroom" => "required!انباری باید وارد شود.|number!انباری باید عدد باشد.",
                "balcony" => "required!بالکن باید وارد شود.|number!باید باید عدد باشد.",
                "parking" => "required!پارکینگ باید وارد شود.|number!پارکینگ باید عدد باشد.",
                "toilet" => "required!توالت باید وارد شود.|max!توالت حداکثر باید ۱۹۱ حرف باشد.",
                "tag" => "required!تگ باید وارد شود.|max!تگ حداکثر باید ۱۹۱ حرف باشد.",
                "cat_id" => "required!باید دسته بندی را انتخاب کنید.|exists!چنین دسته بندی وجود ندارد.",
                "sell_status" => "required!وضعیت خرید یا فروش باید وارد شود.|number!وضعیت خرید و فروش باید عدد باشد.(انتخاب توسط سیستم)",
                "type" => "required!نوع باید وارد شود.|number!نوع باید عدد باشد.(انتخاب توسط سیستم)",
            ]
        ];
    }
}
