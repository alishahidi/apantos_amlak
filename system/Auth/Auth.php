<?php

namespace System\Auth;

use App\User;
use System\Cookie\Cookie;
use System\Security\Security;
use System\Session\Session;

class Auth
{
  private static $redirectTo = "auth.login";

  public static function user()
  {
    if (!Session::get('user') && !Cookie::get("user"))
      return redirect(route(self::$redirectTo));
    $userid = Cookie::get("user") ? Cookie::get("user")->id : Session::get('user');
    Session::set("user", $userid);
    $user = User::find($userid);
    if (!empty($user))
      return $user;
    Session::remove("user");
    return redirect(route(self::$redirectTo));
  }

  public static function userUsingEmail($email)
  {
    $user = User::where("email", $email)->get()[0];
    if (!empty($user))
      return $user;
    return false;
  }

  public static function check()
  {
    if (!Session::get("user"))
      return redirect(route(self::$redirectTo));
    $user = User::find(Session::get("user"));
    if (!empty($user))
      return true;
    Session::remove("user");
    return redirect(route(self::$redirectTo));
  }

  public static function checkLogin()
  {
    if (!Session::get("user"))
      return false;
    $user = User::find(Session::get("user"));
    if (!empty($user))
      return true;
    return false;
  }

  public static function storeUser($inputs, $passwordInputName = null, $encryptedInputs = [])
  {
    foreach ($encryptedInputs as $encryptedInput) {
      $inputs[$encryptedInput]  = Security::encrypt($inputs[$encryptedInput]);
    }
    if ($passwordInputName)
      $inputs[$passwordInputName] = Security::getPassword($inputs[$passwordInputName]);
    User::create($inputs);
  }

  public static function updateUser($inputs, $allowedInputs, $passwordInputName = null, $encryptedInputs = [])
  {
    $inputs = array_intersect_key($inputs, array_flip($allowedInputs));
    foreach ($encryptedInputs as $encryptedInput) {
      $inputs[$encryptedInput]  = Security::encrypt($inputs[$encryptedInput]);
    }
    if ($passwordInputName)
      $inputs[$passwordInputName] = Security::getPassword($inputs[$passwordInputName]);
    User::update($inputs);
  }

  public static function loginUsingEmail($email, $password, $notExistError = null, $wrongPassError = null, $remember = false, $validTime = null)
  {
    $user = User::where("email", $email)->get()[0];
    if (empty($user)) {
      if ($notExistError)
        error("login", $notExistError);
      else
        error("login", "User not exist");
      return back();
    }
    if (Security::cheackPassword($user->password, $password)) {
      // if (!$user->is_active)
      //   return 403;
      if ($remember)
        Cookie::set("user", ["id" => $user->id], $validTime);
      Session::set("user", $user->id);
      return true;
    } else {
      if ($wrongPassError)
        error("login", $wrongPassError);
      else
        error("login", "Wrong password");
      return back();
    }
  }

  public static function loginUsingId($id)
  {
    $user = User::find($id);
    if (empty($user)) {
      error("login", "User dont exist");
      return false;
    } else {
      Session::set("user", $user->id);
      return true;
    }
  }

  public static function checkLimitTimer($timerName, $cheackTime, $errorMessage, $errorName)
  {
    if (Session::get($timerName) != false && (int) Session::get($timerName) > (int) time()) {
      error($errorName, $errorMessage);
      return false;
    } else {
      Session::set($timerName, time() + $cheackTime);
      return true;
    }
  }

  public static function logout()
  {
    Session::remove("user");
    Cookie::remove("user");
  }

  public function __call($name, $arguments)
  {
    return self::methodCaller($name, $arguments);
  }


  private function methodCaller($method, $arguments)
  {
    $suffix = "";
    $methodName = "{$method}{$suffix}";
    return call_user_func_array([$this, $methodName], $arguments);
  }
}
