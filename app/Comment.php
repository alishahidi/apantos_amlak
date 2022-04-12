<?php

namespace App;

use System\Database\ORM\Model;

class Comment extends Model{
    protected $table = "comments";
    protected $fillable = ["user_id", "news_id", "parent_id", "comment", "status", "approved"];

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function child(){
        return $this->hasMany(Comment::class, "parent_id", "id");
    }
}