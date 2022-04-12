<?php

namespace App\Providers;

use App\Ads;
use App\News;
use App\User;
use System\View\Composer;

class AppServiceProvider extends Provider
{
    public function boot()
    {
        return Composer::view("app.index", function () {
            $ads = Ads::all();
            $sumArea = 0;
            foreach ($ads as $advertise) {
                $sumArea += (int) $advertise->area;
            }
            $usersCount = User::count();
            $newsCount = News::count();
            return [
                "sumArea" => $sumArea,
                "userdCount" => (int) $usersCount,
                "adsCount" => count($ads),
                "newsCount" => (int) $newsCount
            ];
        });
    }
}
