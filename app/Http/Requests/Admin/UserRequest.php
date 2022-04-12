<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class UserRequest extends Request
{
    public function rules()
    {
        return [
            "first_name" => "required|max:191",
            "last_name" => "required|max:191",
            "avatar" => "file|mimes:jpeg,jpg,png|max:2048",
        ];
    }
}
