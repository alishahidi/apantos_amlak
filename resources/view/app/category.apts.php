@extends('app.layouts.app')

@section('head-tag')
<title>املاک دسته بندی</title>
@endsection

@section('content')
<div class="hero-wrap" style="background-image: url('<?= asset("app-assets/images/bg_1.jpg") ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= route("home.index") ?>">خانه</a></span> <span>دسته بندی ها</span></p>
                <h1 class="mb-3 bread"><?= e($category->name) ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">آگهی ها</span>
                <h2 class="mb-4"><?= e($category->name) ?></h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row d-flex">
            <?php foreach ($ads as $advertise) { ?>
                <div class="col-3 col-md-6 ftco-animate">
                    <div class="properties">
                        <a href="<?= route("home.ads", [$advertise->id, $advertise->title]) ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('<?= e(asset($advertise->image)) ?>');">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <span class="status <?= e($advertise->sellStatus()) == "اجاره" ? "rent" : "sale" ?>"><?= e($advertise->sellStatus()) ?></span>
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="<?= route("home.ads", [$advertise->id, $advertise->title]) ?>"><?= e($advertise->title) ?></a></h3>
                                    <p><?= e($advertise->type()) ?></p>
                                </div>
                                <div class="two">
                                    <span class="price"><?= e($advertise->amount) ?></span>
                                </div>
                            </div>
                            <?= limitDotPrint(d($advertise->description), 30) ?>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="flaticon-selection mx-1"></i> متر <?= e($advertise->area) ?></span>
                                <span class="ml-auto"><i class="flaticon-bathtub"></i> <?= e($advertise->toilet) ?></span>
                                <span><i class="flaticon-bed"></i> <?= e($advertise->room) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">اخبار</span>
                <h2><?= e($category->name) ?></h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php foreach ($news as $new) { ?>

                <div class="col-3 col-md-6 ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="<?= route("home.news", [$new->id, $new->title]) ?>" class="block-20" style="background-image: url('<?= asset(e($new->image)) ?>');">
                        </a>
                        <div class="text mt-3 d-block">
                            <h3 class="heading mt-3"><a href="<?= route("home.news", [$new->id, $new->title]) ?>"><?= e($new->title) ?></a></h3>
                            <div class="meta mb-3">
                                <div><a href="#"><?= jdate(e($new->created_at))->format("%A, %d %B %y") ?></a></div>
                                <div><a href="#"><?= e($new->user()->first_name) . " " . e($new->user()->last_name) ?></a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> <?= count($new->comments()) ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
@endsection