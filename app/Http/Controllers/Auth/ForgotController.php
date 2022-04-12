<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;
use App\Http\Services\Mail;
use App\User;
use Ramsey\Uuid\Nonstandard\Uuid;
use System\Auth\Auth;
use System\Security\Security;

class ForgotController extends Controller
{

    public function view()
    {
        return view("auth.reset.forgot");
    }

    public function forgot()
    {
        $request = new ForgotRequest();
        if (!Auth::checkLimitTimer("forgot.timer", 120, "هر دو دقیقه فقط یک بار میتوانید درخواست مجدد ارسال کنید.", "forgot.timer"))
            return back();
        $email = $request->email;
        $uuid = Uuid::uuid4()->toString();
        $user = User::where("email", $email)->get()[0];
        $user->remember_token = $uuid;
        $user->save();
        $token = Security::jwtExpEncode(["jti" => $uuid], 60 * 15); // 10m exp time
        Mail::sendTemplateMail($request->email, route('auth.reset.password.view', [$token]), "بازیابی رمز عبور", "برای ورود به صفحه بازیابی رمز عبور بر روی لینک زیر کلیک کنید. لینک تا ۱۵ دقیقه معتبر است", "mail/forgot.jpg");
        flash("user_forgot", "ایمیلی حاوی لینک بازیابی رمز عبور برای شما ارسال شد. لینک تا ۱۵ دقیقه معتبر است");
        return back();
    }
}
