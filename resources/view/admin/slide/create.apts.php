@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|Slide|Create</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h4 class="fw-bold">اسلاید</h4>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= backUrl() ?>" class="btn btn-secondary">بازگشت</a>
                </div>
                <div class="border border-dark p-3 rounded">
                    <form class="row" action="<?= route("admin.slide.store") ?>" method="post" enctype="multipart/form-data">
                        @token
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <fieldset class="form-group">
                                    <label for="title">عنوان</label>
                                    <input value="<?= e(old("title")) ?>" name="title" type="text" id="title" class="form-control <?= errorClass("title") ?>" placeholder="عنوان ...">
                                    <?= errorText("title") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="url">لینک</label>
                                    <input value="<?= e(old("url")) ?>" name="url" type="text" id="url" class="form-control <?= errorClass("url") ?>" placeholder="لینک ...">
                                    <?= errorText("url") ?>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="amount">مبلغ</label>
                                    <input value="<?= e(old("amount")) ?>" name="amount" type="text" id="amount" class="form-control <?= errorClass("amount") ?>" placeholder="مبلغ ...">
                                    <?= errorText("amount") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <fieldset class="form-group">
                                    <label for="address">آدرس</label>
                                    <input value="<?= e(old("address")) ?>" name="address" type="text" id="address" class="form-control <?= errorClass("address") ?>" placeholder="آدرس ...">
                                    <?= errorText("address") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="image">اپلود تصویر </label>
                                        <section class="inputfile-box">
                                            <input type="file" id="file" name="image" class="inputfile form-control-file <?= errorClass("image") ?>" onchange='uploadFile(this)' accept="image/png, image/jpeg, image/gif">
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
                                <fieldset class="form-group">
                                    <label for="image">پیش نمایش عکس</label>
                                    <section class="col-md-12 d-flex justify-content-center">
                                        <img id="image" src="<?= old("image") ?>" class="image-preview-md">
                                    </section>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label for="body">متن</label>
                                    <textarea name="body" class="<?= errorClass("body") ?>" id="body"><?= d(old("body")) ?></textarea>
                                    <?= errorText("body") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <section class="form-group">
                                    <button type="submit" class="btn btn-outline-dark mt-4">ایجاد اسلاید جدید</button>
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

@section('scripts')
<script script src="https://cdn.tiny.cloud/1/0axogb6y0hnw46j04axy5kx7rjfdklzh4g9yzaybb2xd87vo/tinymce/5/tinymce.min.js" referrerpolicy="origin">
</script>
<script src="<?= asset("admin-assets/js/fa_IR.js") ?>"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        plugins: [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        images_upload_url: '<?= route("file.image.upload") ?>?_token=<?= get_start_random_ip_token(); ?>',
        language: 'fa_IR',
        skin: 'oxide-dark',
        content_css: 'dark' // > **Note**: This feature is only available for TinyMCE 5.1 and later.
    });
</script>
@endsection