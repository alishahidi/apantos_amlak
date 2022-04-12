<?php

namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Category;
use App\Gallery;
use App\Http\Requests\Admin\AdsRequest;
use App\Http\Requests\Admin\GalleryRequest;
use App\Http\Services\ImageUpload;
use System\Auth\Auth;

class AdsController extends AdminController
{
    public function index()
    {
        $ads = Ads::all();
        return view("admin.ads.index", compact("ads"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.ads.create", compact("categories"));
    }

    public function store()
    {
        $request = new AdsRequest();
        $inputs = $request->all();
        $inputs["user_id"] = Auth::user()->id;
        $inputs["status"] = 0;
        $inputs["view"] = 0;
        $inputs["image"] = ImageUpload::dateFormatUploadAndFit("image", "ads", 800, 532);
        Ads::create($inputs);
        return redirect(route("admin.ads.index"));
    }

    public function edit($id)
    {
        $advertise = Ads::find($id);
        $categories = Category::all();
        return view("admin.ads.edit", compact("categories", "advertise"));
    }

    public function update($id)
    {
        $request = new AdsRequest();
        $inputs = $request->all();
        $inputs["id"] = $id;
        $image = ImageUpload::dateFormatUploadAndFit("image", "ads", 800, 532);
        if ($image)
            $inputs["image"] = $image;
        $inputs["status"] =  Ads::find($id)->status;
        Ads::update($inputs);
        //dd($inputs);
        return redirect(route("admin.ads.index"));
    }

    public function apiUpdateStatus($id)
    {
    }

    public function destroy($id)
    {
        Ads::delete($id);
        return back();
    }

    public function gallery($id)
    {
        $advertise = Ads::find($id);
        $galleries = Gallery::where("advertise_id", $id)->get();
        return view("admin.ads.gallery", compact("advertise", "galleries"));
    }

    public function storeGalleryImage($id)
    {
        new GalleryRequest();
        $inputs = [];
        $image = ImageUpload::dateFormatUploadAndFit("image", "ads_gallery", 730, 400);
        $inputs["image"] = $image;
        $inputs["advertise_id"] = $id;
        $id = Gallery::create($inputs)->insertId;
        echo json_encode(["status" => true, "url" => asset($image), "id" => $id]);
        return true;
    }

    public function deleteGalleryImage($gallery_id)
    {
        Gallery::delete($gallery_id);
        echo json_encode(["status" => true]);
        return true;
    }
}
