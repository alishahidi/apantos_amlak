<?php

use System\Config\Config;
?>
@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|Ads|Index</title>
<link rel="stylesheet" href="<?= asset("admin-assets/styles/swiper-bundle.min.css") ?>">
<link rel="stylesheet" href="<?= asset("admin-assets/styles/gallery.css") ?>">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h5 class="fw-bold">گالری تصاویر</h5>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= backUrl() ?>" class="btn btn-secondary">بازگشت</a>
                </div>
                <div class="border border-dark p-3 rounded">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <div class="form-group">
                                    <label for="image">اپلود تصویر </label>
                                    <section class="inputfile-box">
                                        <input type="file" id="file" name="image" class="inputfile form-control-file <?= errorClass("image") ?>" onchange='uploadGalleryImage(this);' accept="image/png, image/jpeg, image/gif">
                                        <label for="file" class="uploade-input d-flex flex-column justify-content-center align-items-center c-pointer w-100 file-input-fill">
                                            <span>
                                                انتخاب فایل
                                            </span>
                                            <span id="file-name" class="file-box"> png و jpg فرمت های قابل قبول</span>
                                            <span><?= errorText("image") ?></span>
                                        </label>
                                        <section class=" clear-fix"></section>
                                    </section>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($galleries as $gallery) { ?>
                                        <div class="swiper-slide">
                                            <div class="img-box">
                                                <img src="<?= asset($gallery->image) ?>" alt="">
                                                <i class="bi bi-x c-pointer" onclick="deleteGalleryImage(this, <?= $gallery->id ?>)"></i>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="<?= asset("admin-assets/js/swiper-bundle.min.js") ?>"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    const uploadGalleryImage = target => {
        let file = target.files[0];
        const formData = new FormData();
        formData.append('image', file)
        axios.post("<?php echo route("admin.ads.store.gallery.image", [$advertise->id]) . "?_token=" .  get_start_random_ip_token() ?>", formData)
            .then(function(response) {
                if (response.data.status) {
                    let imgUrl = response.data.url;
                    let id = response.data.id;
                    console.log(id);
                    swiper.appendSlide(
                        `<div class="swiper-slide"><div class="img-box"><img src="${imgUrl}" alt=""><i class="bi bi-x c-pointer" onclick="deleteGalleryImage(this, ${id})"></i></div></div>`
                    );
                    Toast.fire({
                        icon: 'success',
                        title: 'با موفقیت به گالری این آگهی اضافه شد.'
                    })
                } else
                    Toast.fire({
                        icon: 'error',
                        title: 'مشکلی در کلاینت یا سرور پیش آمده.'
                    })
            })
            .catch(function(error) {
                Toast.fire({
                    icon: 'error',
                    title: 'مشکلی در سرور پیش آمده.'
                })
            });
    };

    const deleteGalleryImage = (target, id) => {
        axios.delete(`/admin/ads/delete-gallery-image/${id} ? _token = <?= get_start_random_ip_token() ?>`)
            .then(function(response) {
                if (response.data.status) {
                    target.offsetParent.offsetParent.remove()
                    Toast.fire({
                        icon: 'success',
                        title: 'با موفقیت از گالری این آگهی حذف شد.'
                    })
                } else
                    Toast.fire({
                        icon: 'error',
                        title: 'مشکلی در کلاینت یا سرور پیش آمده.'
                    })
            })
            .catch(function(error) {
                Toast.fire({
                    icon: 'error',
                    title: 'مشکلی در سرور پیش آمده.'
                })
            });
    };
</script>
@endsection