<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Services\ImageUpload;
use System\Auth\Auth;
use System\Request\Request;

class NewsController extends AdminController
{
    public function index()
    {
        $posts = News::all();
        return view("admin.news.index", compact("posts"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.news.create", compact("categories"));
    }

    public function store()
    {
        $request = new NewsRequest();
        $inputs = $request->all();
        $inputs["user_id"] = Auth::user()->id;
        $inputs["status"] = 0;
        $inputs["image"] = ImageUpload::dateFormatUploadAndFit("image", "news", 800, 499);
        News::create($inputs);
        return redirect(route("admin.news.index"));
    }

    public function edit($id)
    {
        $news = News::find($id);
        $categories = Category::all();
        return view("admin.news.edit", compact("news", "categories"));
    }

    public function update($id)
    {
        $request = new NewsRequest();
        $inputs = $request->all();
        $inputs["id"] = $id;
        $image = ImageUpload::dateFormatUploadAndFit("image", "news", 800, 499);
        if ($image)
            $inputs["image"] = $image;
        $inputs["status"] =  News::find($id)->status;
        News::update($inputs);
        return redirect(route("admin.news.index"));
    }

    public function updateStatus($id)
    {
        new Request();
        $news = News::find($id);
        $inputs = ["id" => $id, "status" => $news->status == 0 ? 1 : 0];
        $class = $news->status == 0 ? "text-danger" : "text-success";
        $inner = $news->status == 0 ? "غیر فعال کردن" : "فعال کردن";
        $alertInner = $news->status == 0 ? "فعال" : "غیر فعال";
        News::update($inputs);
        echo json_encode(["status" => true, "class" => $class, "inner" => $inner, "alertInner" => $alertInner]);
        return true;
    }

    public function destroy($id)
    {
        News::delete($id);
        return back();
    }
}
