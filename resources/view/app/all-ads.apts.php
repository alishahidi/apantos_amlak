@extends('app.layouts.app')

@section('head-tag')
<title>املاک - مشاهده آگهی ها</title>
@endsection

@section('content')
<div class="hero-wrap" style="background-image: url('<?= asset("app-assets/images/bg_1.jpg") ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= route("home.index") ?>">خانه</a></span> <span>آگهی ها</span></p>
                <h1 class="mb-3 bread">آگهی ها</h1>
            </div>
        </div>
    </div>
</div>



<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($ads as $advertise) { ?>
                <div class="col-md-4 ftco-animate">
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
                            <?= limitDotPrint(d($advertise->description), 120) ?>
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