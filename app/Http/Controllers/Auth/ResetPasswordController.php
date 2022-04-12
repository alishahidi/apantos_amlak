<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\User;
use System\Auth\Auth;
use System\Security\Security;

class ResetPasswordController extends Controller
{

    public function view($token)
    {
        $payloade = Security::jwtDecode($token);
        if (!$payloade)
            safeHeader('HTTP/1.1 401 Unauthorized', 'Token expired or not valid');
        return view("auth.reset.reset-password", compact("token"));
    }

    public function resetPassword($token)
    {
        $request = new ResetPasswordRequest();
        $payloade = Security::jwtDecode($token);
        if (!$payloade)
            safeHeader('HTTP/1.1 401 Unauthorized', 'Token expired or not valid');
        $rememberToken = $payloade->jti;
        $user = User::where("remember_token", $rememberToken)->get()[0];
        $user->password = Security::getPassword($request->password);
        $user->save();
        flash("user_reset_password_success", "پسورد با موفقیت تغییر کرد.");
        return redirect(route("auth.login"));
    }
}
