<?php

namespace App\Http\Controllers\Home;

use App\Ads;
use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UserCommentRequest;
use App\News;
use App\Slide;
use System\Auth\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Slide::all();
        $newestAds = Ads::orderBy("created_at", "DESC")->limit(0, 6)->get();
        $bestAds = Ads::orderBy("view", "DESC")->orderBy("created_at", "DESC")->limit(0, 4)->get();
        $news = News::where("published_at", "<=", date("Y-m-d H:i:s"))->orderBy("created_at", "DESC")->limit(0, 4)->get();
        return view('app.index', compact("slides", "newestAds", "bestAds", "news"));
    }

    public function about()
    {
        return view('app.about');
    }

    public function allAds()
    {
        $ads = Ads::paginate(6);
        $adsCount = Ads::count();
        return view("app.all-ads", compact("ads", "adsCount"));
    }

    public function ads($id, $slug)
    {
        $advertise = Ads::find($id);
        $galleries = $advertise->galleries()->get();
        $news = News::where("published_at", "<=", date("Y-m-d H:i:s"))->orderBy("created_at", "DESC")->limit(0, 4)->get();
        $relatedAds = Ads::where("cat_id", $advertise->cat_id)->where("id", '!=', $id)->randomOrder("DESC")->limit(0, 2)->get();
        $categories = Category::all();
        return view("app.ads", compact("advertise", "galleries", "news", "relatedAds", "categories"));
    }

    public function allNews()
    {
        $news = News::paginate(6);
        $newsCount = News::count();
        return view("app.all-news", compact("news", "newsCount"));
    }

    public function news($id, $slug)
    {
        $new = News::find($id);
        $relatedNews = News::where("cat_id", $new->cat_id)->where("id", '!=', $id)->randomOrder("DESC")->limit(0, 2)->get();
        $categories = Category::all();
        $comments = Comment::where("approved", 1)->whereNull("parent_id")->where("news_id", $id)->get();
        return view("app.new", compact("new", "relatedNews", "categories", "comments"));
    }

    public function comment($id){
        Auth::check();
        // if(Auth::user()->user_type != "admin"){
        //     redirect(route("auth.login.view"));
        //     exit;
        // }
        $request = new UserCommentRequest();
        $inputs = $request->all();
        $inputs["news_id"] = $id;
        $inputs["approved"] = 0;
        $inputs["status"] = 0;
        $inputs["user_id"] = Auth::user()->id;
        Comment::create($inputs);
        return back();
    }

    public function category($id, $slug)
    {
        $category = Category::find($id);
        $ads = $category->ads()::all();
        $news = $category->news()::all();
        return view("app.category", compact("category", "ads", "news"));
    }

    public function search()
    {
        if(!isset($_GET["query"]))
            return route("home.index");
        
        $search = "%" . $_GET["query"] . "%";
        $ads = Ads::where("title", "LIKE", $search)->whereOr("tag", "LIKE", $search)->get();
        $news = Ads::where("title", "LIKE", $search)->get();
        return view("app.search", compact("ads", "news"));
    }
}
