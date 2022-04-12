<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class GalleryRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "image" => "required|file|mimes:jpeg,jpg,png,gif",
            ],
            "errors" => [
                "image" => "required!عکس باید وارد شود.|mimes!نوع عکس ارسالی غلط است.",
            ]
        ];
    }
}
