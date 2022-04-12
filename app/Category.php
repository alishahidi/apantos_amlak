<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Category extends Model{
    use HasSoftDelete;
    protected $table = "categories";
    protected $fillable = ["name", "parent_id"];

    public function parent()
    {
        return $this->belongsTo("\App\Category", "parent_id", "id");
    }

    public function ads(){
        return $this->hasMany(Ads::class, "cat_id", "id");
    }
    
    public function news(){
        return $this->hasMany(News::class, "cat_id", "id");
    }
}