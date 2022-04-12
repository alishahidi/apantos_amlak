<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\ImageUpload;
use App\Http\Services\Mail;
use App\User;
use Ramsey\Uuid\Uuid;
use System\Auth\Auth;
use System\Security\Security;

class RegisterController extends Controller
{
    public function view()
    {
        return view("auth.forms.register");
    }

    public function register()
    {
        $request = new RegisterRequest();
        $inputs = $request->all();
        $uuid = Uuid::uuid4()->toString();
        $inputs["avatar"] = ImageUpload::uploadAndFit("avatar", "user_avatar", 100, 100);
        $inputs['verify_token'] = $uuid;
        $inputs['is_active'] = 0;
        $inputs['user_type'] = 'user';
        $inputs['status'] = 0;
        $inputs['remember_token'] = null;
        $inputs['remember_token_expire'] = null;
        Auth::storeUser($inputs, "password");
        $token = Security::jwtExpEncode(["jti" => $uuid], 60 * 60); // 1h exp time
        Mail::sendTemplateMail($request->email, route('auth.activation', [$token]), "فعالسازی اکانت", "برای فعالسازی اکامن خود بر روی لینک زیر کلیک کنید. لینک تا یک ساعت معتبر است", "mail/activate.jpg");
        flash("user_activation_send", "ایمیلی شامل لینک فعالسازی اکانت برای شما ارسال شد.");
        return redirect(route("auth.login"));
    }

    public function activation($token)
    {
        $payloade = Security::jwtDecode($token);
        if (!$payloade)
            safeHeader('HTTP/1.1 401 Unauthorized', 'Token expired or not valid');
        $verifyToken = $payloade->jti;
        $user = User::where("verify_token", $verifyToken)->get()[0];
        $user->is_active = 1;
        $user->save();
        flash("user_activation_success", "حساب کاربری با موفقیت تایید شد.");
        return redirect(route("auth.login"));
    }
}
