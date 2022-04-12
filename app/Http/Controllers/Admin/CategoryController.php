<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::all();        return view("admin.category.index", compact("categories"));
    }

    public function create()
    {
        $categories = Category::whereNull("parent_id")->get();
        return view("admin.category.create", compact("categories"));
    }

    public function store()
    {
        $request = new CategoryRequest;
        $inputs = $request->all();
        if (empty($inputs["parent_id"])) unset($inputs["parent_id"]);
        Category::create($inputs);
        return redirect(route("admin.category.index"));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::whereNull("parent_id")->get();
        return view("admin.category.edit", compact("categories", "category"));
    }

    public function update($id)
    {
        $request = new CategoryRequest;
        $inputs = $request->all();
        $inputs["id"] = $id;
        Category::update($inputs);
        return redirect(route("admin.category.index"));
    }

    public function destroy($id)
    {
        Category::delete($id);
        return back();
    }
}
