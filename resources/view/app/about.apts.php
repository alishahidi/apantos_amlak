@extends('app.layouts.app')

@section('head-tag')
<title>املاک درباره ما</title>
@endsection

@section('content')

<div class="hero-wrap" style="background-image: url('<?= asset("app-assets/images/bg_1.jpg") ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="
            row
            no-gutters
            slider-text
            align-items-center
            justify-content-center
          ">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">خانه</a></span>
                    <span>درباره ما</span>
                </p>
                <h1 class="mb-3 bread">درباره ما</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="
              col-md-5
              p-md-5
              img img-2
              d-flex
              justify-content-center
              align-items-center
            " style="background-image: url('<?= asset("app-assets/images/about.jpg") ?>')">
                <a href="https://vimeo.com/45830194" class="
                icon
                popup-vimeo
                d-flex
                justify-content-center
                align-items-center
              ">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section heading-section-wo-line mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <span class="subheading">خلاصه وبسایت</span>
                        <h2 class="mb-4">وبسایت تاپ لرن</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        وب سایت تاپ لرن در پاییز 1396 پیاده سازی شده است . تاپ لرن یک
                        پلتفرم کاملا متفاوت در زمینه یادگیری و آموزش بوده تا بتواند برای
                        کسب و کار , توسعه و نگهداری نرم افزار , فن آوری های جدید و مهارت
                        های خلاقانه ای که شما به دنبال ان هستید به صورت حرفه ای آموزش
                        ببینید. در تاپ لرن همیشه به روز باشید: اگر شما سعی دارید به صورت
                        فردی برای بالا بردن مهارت های خود در جهت کسب و کار قصد دارید از
                        آموزش آنلاین استفاده کنید : تاپ لرن کی از بهترین گزینه های شما
                        خواهد بود . کافیست با مشاهده بیش از 10 ها ساعت ویدئویی که در
                        سایت به صورت رایگان می باشد مهارت های خود را افزایش دهید .
                        همچنین با هزینه هایی باور نکردنی که برای دوره های خاصی در سایت
                        گذاشته شده است می توانید به صورت حرفه ای مهارت های خود را به سطح
                        حرفه ای برسانید. امروزه بسیاری از شرکت های بزرگ دنیا با توجه به
                        نیاز های سازمانی از افراد مورد اعتماد خود در سازمان برای رفع
                        نیازهای خود استفاده می کنند . با توجه به هزینه آموزش به صورت
                        حضوری و البته چالش هایی نظیر مکان , زمان و همچنین استاد مناسب رو
                        به رو خواهند بود . شرکت ها ی خصوصی و دولتی می توانند با دسترسی
                        به ویدئو های آموزشی تاپ لرن مهارت های کارمندان خود را افزایش
                        دهند تا در واقع با بهره گیری و اپدیت نیرو های خود شاهد عملکرد
                        چشم گیری انان در سازمان باشند
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection