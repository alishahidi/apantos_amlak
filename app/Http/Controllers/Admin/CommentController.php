<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Requests\Admin\CommentRequest;
use System\Auth\Auth;
use System\Request\Request;

class CommentController extends AdminController
{
    public function index()
    {
        $comments = Comment::all();
        return view("admin.comment.index", compact("comments"));
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        return view("admin.comment.show", compact("comment"));
    }

    public function anser($id)
    {
        $comment = Comment::find($id);
        $request = new CommentRequest();
        $inputs = $request->all();
        $inputs["user_id"] = Auth::user()->id;
        $inputs["news_id"] = $comment->news_id;
        $inputs["parent_id"] = $comment->id;
        $inputs["approved"] = 1;
        $inputs["status"] = 0;
        Comment::create($inputs);
        return back();
    }
 
    public function updateApproved($id)
    {
        new Request();
        $comment = Comment::find($id);
        $inputs = ["id" => $id, "approved" => $comment->approved == 0 ? 1 : 0];
        $class = $comment->approved == 0 ? "text-danger" : "text-success";
        $inner = $comment->approved == 0 ? "غیر فعال کردن" : "فعال کردن";
        $alertInner = $comment->approved == 0 ? "فعال" : "غیر فعال";
        Comment::update($inputs);
        echo json_encode(["status" => true, "class" => $class, "inner" => $inner, "alertInner" => $alertInner]);
        return true;
    }
}
