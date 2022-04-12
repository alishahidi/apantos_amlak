<?php

namespace App\Http\Requests\Home;

use System\Request\Request;

class UserCommentRequest extends Request
{
    public function rules()
    {
        return [
            "rules" => [
                "comment" => "required|max:191",
            ],
            "errors" => [
                "comment" => "required!متن نظر باید وارد شود.|max!متن نظر باید از ۱۹۱ حرف کمتر باشد.",
            ]
        ];
    }
}
