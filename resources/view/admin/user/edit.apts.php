@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|User|Create</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h4 class="fw-bold">اخبار</h4>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= backUrl() ?>" class="btn btn-secondary">بازگشت</a>
                </div>
                <div class="border border-dark p-3 rounded">
                    <form class="row" action="<?= route("admin.user.update", [$user->id]) ?>" method="post" enctype="multipart/form-data">
                        @token
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="first_name">نام</label>
                                    <input value="<?= e(oldOr("first_name", e($user->first_name))) ?>" name="first_name" type="text" id="first_name" class="form-control <?= errorClass("first_name") ?>" placeholder="نام ...">
                                    <?= errorText("first_name") ?>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="last_name">نام خانوادگی </label>
                                    <input value="<?= e(oldOr("last_name", e($user->last_name))) ?>" name="last_name" type="text" id="last_name" class="form-control <?= errorClass("last_name") ?>" placeholder="نام ...">
                                    <?= errorText("last_name") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="avatar">اپلود تصویر </label>
                                        <section class="inputfile-box">
                                            <input type="file" id="file" name="avatar" class="inputfile form-control-file <?= errorClass("avatar") ?>" onchange='uploadFile(this)' accept="image/png, image/jpeg, image/gif">
                                            <label for="file" class="uploade-input d-flex flex-column justify-content-center align-items-center c-pointer w-100 file-input-fill">
                                                <span>
                                                    انتخاب فایل
                                                </span>
                                                <span id="file-name" class="file-box"> png و jpg فرمت های قابل قبول</span>
                                                <span><?= errorText("avatar") ?></span>
                                            </label>
                                            <section class=" clear-fix"></section>
                                        </section>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="image">پیش نمایش عکس</label>
                                    <section class="col-md-12 d-flex justify-content-center">
                                        <img id="image" src="<?= $user->avatar ?>" class="image-preview-md">
                                    </section>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <section class="form-group">
                                    <button type="submit" class="btn btn-outline-dark mt-4">ویرایش کاربر</button>
                                </section>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection