<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\Mail;
use System\Auth\Auth;
use System\Security\Security;

class LoginController extends Controller
{

    public function view()
    {
        return view("auth.forms.login");
    }

    public function login()
    {
        $request = new LoginRequest();
        $remember = $request->remember == "on";
        if ($remember)
            $res = Auth::loginUsingEmail($request->email, $request->password, "کاربری با مشخصات وارد شده پیدا نشد.", "پسورد اشتباه است", $remember, 4 * 24 * 60 * 60);
        else
            $res = Auth::loginUsingEmail($request->email, $request->password, "کاربری با مشخصات وارد شده پیدا نشد.", "پسورد اشتباه است");
        if ($res === 403) {
            $user = Auth::userUsingEmail($request->email);
            $uuid = $user->verify_token;
            $token = Security::jwtExpEncode(["jti" => $uuid], 60 * 60); // 1h exp time
            Mail::sendTemplateMail($request->email, route('auth.activation', [$token]), "فعالسازی اکانت", "برای فعالسازی اکامن خود بر روی لینک زیر کلیک کنید. لینک تا یک ساعت معتبر است", "mail/activate.jpg");
            flash("user_activation_send", "اکانت شما فعال نمیباشد. ایمیلی شامل لینک فعالسازی برای شما ارسال شد.");
            return redirect(route("auth.login"));
        }
        $user = Auth::userUsingEmail($request->email);
        if ($user->user_type == "admin")
            return redirect(route("admin.index"));
        return redirect(route("home.index"));
    }
}
