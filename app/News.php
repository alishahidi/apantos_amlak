<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class News extends Model{
    use HasSoftDelete;
    protected $table = "news";
    protected $fillable = ["title", "body", "cat_id", "image", "published_at", "status", "user_id"];
    protected $casts = ["image" => "array"];

    public function category()
    {
        return $this->belongsTo("\App\Category", "cat_id", "id");
    }

    public function user()
    {
        return $this->belongsTo("\App\User", "user_id", "id");
    }

    public function comments(){
        return $this->hasMany('\App\Comment', "news_id", "id")->get();
    }
}