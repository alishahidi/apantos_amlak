<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Slide;
use App\Http\Requests\Admin\SlideRequest;
use App\Http\Services\ImageUpload;
use System\Auth\Auth;
use System\Request\Request;

class SlideController extends AdminController
{
    public function index()
    {
        $slides = Slide::all();
        return view("admin.slide.index", compact("slides"));
    }

    public function create()
    {
        return view("admin.slide.create");
    }

    public function store()
    {
        $request = new SlideRequest();
        $inputs = $request->all();
        $inputs["image"] = ImageUpload::dateFormatUploadAndFit("image", "slide", 1500, 904);
        Slide::create($inputs);
        return redirect(route("admin.slide.index"));
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view("admin.slide.edit", compact("slide"));
    }

    public function update($id)
    {
        $request = new SlideRequest();
        $inputs = $request->all();
        $inputs["id"] = $id;
        $image = ImageUpload::dateFormatUploadAndFit("image", "slide", 800, 499);
        if ($image)
            $inputs["image"] = $image;
        Slide::update($inputs);
        return redirect(route("admin.slide.index"));
    }

    public function destroy($id)
    {
        Slide::delete($id);
        return back();
    }
}
