<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class CategoryRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "name" => "required|max:191",
                "parent_id" => "exists:categories,id"
            ],
            "errors" => [
                "name" => "required!نام دسته بندی باید وارد شود.|max!نام دسته بندی باید از ۱۹۱ حرف کمتر باشد.",
                "parent_id" => "exists!چنین دسته بندی وجود ندارد."
            ]
        ];
    }
}
