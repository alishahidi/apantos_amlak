<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Ads extends Model
{
    use HasSoftDelete;
    protected $table = "ads";
    protected $fillable = ["title", "description", "address", "amount", "image", "floor", "year", "storeroom", "balcony", "area", "room", "toilet", "parking", "tag", "status", "user_id", "cat_id", "sell_status", "type", "view"];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, "advertise_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "cat_id", "id");
    }

    public function sellStatus()
    {
        return $this->sell_status == 0 ? "اجاره" : "خرید";
    }

    public function type()
    {
        switch ($this->type) {
            case 0:
                return "آپارتمان";
                break;
            case 1:
                return "ویلایی";
                break;
            case 2:
                return "زمین";
                break;
            case 3:
                return "سوله";
                break;
        }
    }
}
