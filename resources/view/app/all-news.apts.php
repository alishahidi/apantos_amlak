@extends('app.layouts.app')

@section('head-tag')
<title>املاک - مشاهده اخبار</title>
@endsection

@section('content')
<div class="hero-wrap" style="background-image: url('<?= asset("app-assets/images/bg_1.jpg") ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= route("home.index") ?>">خانه</a></span> <span>بلاگ</span></p>
                <h1 class="mb-3 bread">بلاگ ها</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($news as $new) { ?>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="<?= route("home.news", [$new->id, $new->title]) ?>" class="block-20" style="background-image: url('<?= asset($new->image) ?>');">
                        </a>
                        <div class="text mt-3 d-block">
                            <h3 class="heading mt-3"><a href="<?= route("home.news", [$new->id, $new->title]) ?>"><?= e($new->title) ?></a></h3>
                            <div class="meta mb-3">
                                <div><a href="#"><?= jdate(e($new->created_at))->format("%A, %d %B %y") ?></a></div>
                                <div><a href="#"><?= e($new->user()->first_name . " " . $new->user()->last_name) ?></a></div>
                                <!-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> ۳</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul class="d-flex flex-row-reverse justify-content-center">
                        <?= paginateView($adsCount, 6, 4, 4, route("home.ads.all"), '<li><a href="{link}">{counter}</a></li>', '<li class="active"><a href="{link}">{counter}</a></li>', "link", "counter") ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection