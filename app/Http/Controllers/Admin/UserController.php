<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Services\ImageUpload;
use System\Auth\Auth;
use System\Request\Request;

class UserController extends AdminController
{
    public function index()
    {
        $users = User::all();
        return view("admin.user.index", compact("users"));
    }

    public function create()
    {
        return view("admin.user.create");
    }

    public function store()
    {
        $request = new UserRequest();
        $inputs = $request->all();
        $inputs["user_id"] = Auth::user()->id;
        $inputs["status"] = 0;
        $inputs["image"] = ImageUpload::dateFormatUploadAndFit("image", "user", 800, 499);
        User::create($inputs);
        return redirect(route("admin.user.index"));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.user.edit", compact("user"));
    }

    public function update($id)
    {
        $request = new UserRequest();
        $inputs = $request->all();
        $inputs["id"] = $id;
        $avatar = ImageUpload::uploadAndFit("avatar", "user_avatar", 100, 100);
        if ($avatar)
            $inputs["avatar"] = $avatar;
        $inputs["status"] =  User::find($id)->status;
        Auth::updateUser($inputs, ["first_name", "last_name", "avatar", "id"]);
        return redirect(route("admin.user.index"));
    }

    public function updateActive($id)
    {
        new Request();
        $user = User::find($id);
        $inputs = ["id" => $id, "is_active" => $user->is_active == 0 ? 1 : 0];
        $class = $user->is_active == 0 ? "text-danger" : "text-success";
        $inner = $user->is_active == 0 ? "غیر تایید کردن" : "تایید کردن";
        $alertInner = $user->is_active == 0 ? "تایید" : "غیر تایید";
        User::update($inputs);
        echo json_encode(["status" => true, "class" => $class, "inner" => $inner, "alertInner" => $alertInner]);
        return true;
    }

    public function updateStatus($id)
    {
        new Request();
        $user = User::find($id);
        $inputs = ["id" => $id, "status" => $user->status == 0 ? 1 : 0];
        $class = $user->status == 0 ? "text-danger" : "text-success";
        $inner = $user->status == 0 ? "غیر فعال کردن" : "فعال کردن";
        $alertInner = $user->status == 0 ? "فعال" : "غیر فعال";
        User::update($inputs);
        echo json_encode(["status" => true, "class" => $class, "inner" => $inner, "alertInner" => $alertInner]);
        return true;
    }

    public function destroy($id)
    {
        User::delete($id);
        return back();
    }
}
