<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use System\Auth\Auth;

class AdminController extends Controller{

    public function __construct()
    {
        Auth::check();
        if(Auth::user()->user_type != "admin"){
            redirect(route("auth.login.view"));
            exit;
        }

    }

    public function index(){
        return view("admin.index");
    }
}