@extends('app.layouts.app')

@section('head-tag')
<title>املاک - <?= $advertise->title ?></title>
@endsection

@section('content')
<div class="hero-wrap" style="background-image: url('<?= asset($advertise->image) ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">خانه</a></span> <span class="mr-2"><a href="blog.html">آگهی ها</a></span> <span><?= e($advertise->title) ?></span></p>
                <h1 class="mb-3 bread">آگهی</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="single-slider owl-carousel">
                            <?php foreach ($galleries as $gallery) { ?>
                                <div class="item">
                                    <div class="properties-img" style="background-image: url('<?= asset($gallery->image) ?>');"></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 Properties-single mt-4 mb-5 ftco-animate">
                        <h2><?= e($advertise->title) ?></h2>
                        <p class="rate mb-4">
                            <span class="loc"><a href="#"><i class="icon-map"></i> <?= e($advertise->address) ?></a></span>
                        </p>
                        <p><?= d($advertise->description) ?></p>
                        <div class="d-md-flex mt-5 mb-5">
                            <ul>
                                <li><span>متراژ : </span> <?= e($advertise->area) ?></li>
                                <li><span>اتاق خواب : </span> <?= e($advertise->room) ?></li>
                                <li><span>سرویس بهداشتی : </span> <?= e($advertise->toilet) ?></li>
                                <li><span>پارکینگ : </span> <?= e($advertise->parking) ?></li>
                                <li><span>بالکن : </span> <?= $advertise->balcony ? "دارد" : "ندارد" ?></li>
                            </ul>
                            <ul class="ml-md-5">
                                <li><span>نوع کفپوش : </span> <?= e($advertise->floor) ?></li>
                                <li><span>سال ساخت : </span> <?= e($advertise->year) ?></li>
                                <li><span>انباری : </span> <?= e($advertise->storeroom) ?></li>
                                <li><span>نوع ملک : </span> <?= $advertise->type() ?></li>
                                <li><span>نوع آگهی : </span> <?= $advertise->sellStatus() ?></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-12 properties-single ftco-animate mb-5 mt-5">
                        <h4 class="mb-4">آگهی های مرتبط</h4>
                        <div class="row">
                            <?php foreach ($relatedAds as $advertise) { ?>
                                <div class="col-md-6 ftco-animate">
                                    <div class="properties">
                                        <a href="<?= route("home.ads", [$advertise->id, $advertise->title]) ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('<?= asset($advertise->image) ?>');">
                                            <div class="icon d-flex justify-content-center align-items-center">
                                                <span class="icon-search2"></span>
                                            </div>
                                        </a>
                                        <div class="text p-3">
                                            <span class="status <?= e($advertise->sellStatus()) == "اجاره" ? "rent" : "sale" ?>"><?= e($advertise->sellStatus()) ?></span>
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="property-single.html"><?= e($advertise->title) ?></a></h3>
                                                    <p><?= e($advertise->type()) ?></p>
                                                </div>
                                                <div class="two">
                                                    <span class="price"><?= e($advertise->amount) ?> تومان</span>
                                                </div>
                                            </div>
                                            <?= limitDotPrint(d($advertise->description), 30) ?>
                                            <hr>
                                            <p class="bottom-area d-flex">
                                                <span><i class="flaticon-selection"></i> <?= e($advertise->area) ?> متر</span>
                                                <span class="ml-auto"><i class="flaticon-bathtub"></i> <?= e($advertise->room) ?></span>
                                                <span><i class="flaticon-bed"></i> <?= e($advertise->toilet) ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">

                <div class="sidebar-box ftco-animate"></div>
                    <div class="categories">
                        <h3>دسته بندی ها</h3>
                        <?php foreach ($categories as $category) { ?>
                            <li><a href="<?= route("home.category", [$category->id, $category->name]) ?>"><?= $category->name ?> <span>(<?= count(array($category->ads())) ?>)</span></a></li>
                        <?php } ?>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>اخرین بلاگ ها</h3>
                    <?php foreach($news as $new){ ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url('<?= asset($new->image) ?>');"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#"><?= e($new->title) ?></a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> <?= jdate(e($new->created_at))->format("%A, %d %B %y") ?></a></div>
                                    <div><a href="#"><span class="icon-person"></span> <?= e($new->user()->first_name) . " " . e($new->user()->last_name) ?></a></div>
                                    <div><a href="#"><span class="icon-chat"></span> <?= count(array($new->comments())) ?></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
