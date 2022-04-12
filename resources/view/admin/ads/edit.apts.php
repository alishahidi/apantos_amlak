@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|News|Create</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h4 class="fw-bold">آگهی</h4>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= backUrl() ?>" class="btn btn-secondary">بازگشت</a>
                </div>
                <div class="border border-dark p-3 rounded">
                    <form class="row" action="<?= route("admin.ads.update", [$advertise->id]) ?>" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @token
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <fieldset class="form-group">
                                    <label for="title">عنوان</label>
                                    <input value="<?= e(oldOr('title', $advertise->title)) ?>" name="title" type="text" id="title" class="form-control <?= errorClass('title') ?>" placeholder="عنوان ...">
                                    <?= errorText('title') ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="image">اپلود تصویر </label>
                                        <section class="inputfile-box">
                                            <input type="file" id="file" name="image" class="inputfile form-control-file" onchange='uploadFile(this)' accept="image/png, image/jpeg, image/gif">
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
                            <div class="col-md-6 mb-4">
                                <fieldset class="form-group">
                                    <label for="image">پیش نمایش عکس</label>
                                    <section class="col-md-12 d-flex justify-content-center">
                                        <img id="image" src="<?= oldOr("image", $advertise->image) ?>" class="image-preview-md">
                                    </section>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label for="address">آدرس</label>
                                    <input value="<?= e(oldOr('address', $advertise->address)) ?>" name="address" type="text" id="address" class="form-control <?= errorClass('address') ?>" placeholder="آدرس ...">
                                    <?= errorText('address') ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 mb-4">
                                <fieldset class="form-group">
                                    <label for="floor">کف</label>
                                    <input name="floor" value="<?= e(oldOr('floor', $advertise->floor)) ?>" type="text" id="floor" class="form-control <?= errorClass('floor') ?>" placeholder="کف ...">
                                    <?= errorText('floor') ?>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-4">
                                <fieldset class="form-group">
                                    <label for="year">سال ساخت</label>
                                    <input name="year" value="<?= e(oldOr('year', $advertise->year)) ?>" type="text" id="year" class="form-control <?= errorClass('year') ?>" placeholder="سال ساخت ...">
                                    <?= errorText('year') ?>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-4">
                                <fieldset class="form-group">
                                    <label for="amount">قیمت</label>
                                    <input name="amount" value="<?= e(oldOr('amount', $advertise->amount)) ?>" type="text" id="amount" class="form-control <?= errorClass('amount') ?>" placeholder="قیمت ...">
                                    <?= errorText('amount') ?>
                                </fieldset>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 mb-4">
                                <fieldset class="form-group">
                                    <label for="area">متراژ</label>
                                    <input name="area" value="<?= e(oldOr('area', $advertise->area)) ?>" type="text" id="area" class="form-control <?= errorClass('area') ?>" placeholder="سال ساخت ...">
                                    <?= errorText('area') ?>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-4">
                                <fieldset class="form-group">
                                    <label for="room">اتاق</label>
                                    <input name="room" value="<?= e(oldOr('room', $advertise->room)) ?>" type="text" id="room" class="form-control <?= errorClass('room') ?>" placeholder="سال ساخت ...">
                                    <?= errorText('room') ?>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-4">
                                <fieldset class="form-group">
                                    <label for="tag">تگ</label>
                                    <input name="tag" value="<?= e(oldOr('tag', $advertise->tag)) ?>" type="text" id="tag" class="form-control <?= errorClass('tag') ?>" placeholder="تگ ...">
                                    <?= errorText('tag') ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12 mb-4">
                                <fieldset class="form-group">
                                    <label for="description">متن</label>
                                    <textarea name="description" class="<?= errorClass('description') ?>" id="description"><?= d(oldOr('description', $advertise->description)) ?></textarea>
                                    <?= errorText('description') ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="storeroom">انبار</label>
                                        <select name="storeroom" class="form-control <?= errorClass("storeroom") ?>">
                                            <option value="0" <?= oldOr("storeroom", $advertise->storeroom) == "0"  ? "selected" : "" ?>>ندارد</option>
                                            <option value="1" <?= oldOr("storeroom", $advertise->storeroom) == "1"  ? "selected" : "" ?>>دارد</option>
                                        </select>
                                        <?= errorText("storeroom") ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-3 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="balcony">بالکن</label>
                                        <select name="balcony" class="form-control <?= errorClass("balcony") ?>">
                                            <option value="0" <?= oldOr("balcony", $advertise->balcony) == "0"  ? "selected" : "" ?>>ندارد</option>
                                            <option value="1" <?= oldOr("balcony", $advertise->balcony) == "1"  ? "selected" : "" ?>>دارد</option>
                                        </select>
                                        <?= errorText("balcony") ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-3 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="toilet">توالت</label>
                                        <select name="toilet" class="form-control <?= errorClass("toilet") ?>">
                                            <option value="ایرانی" <?= oldOr("toilet", $advertise->toilet) == "ایرانی"  ? "selected" : "" ?>>ایرانی</option>
                                            <option value="فرنگی" <?= oldOr("toilet", $advertise->toilet) == "فرنگی"  ? "selected" : "" ?>>فرنگی</option>
                                            <option value="ایرانی و فرنگی" <?= oldOr("toilet", $advertise->toilet) == "ایرانی و فرنگی"  ? "selected" : "" ?>>ایرانی و فرنگی</option>
                                        </select>
                                        <?= errorText("toilet") ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-3 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="parking">پارکینگ</label>
                                        <select name="parking" class="form-control <?= errorClass("parking") ?>">
                                            <option value="0" <?= oldOr("parking", $advertise->parking) == "0"  ? "selected" : "" ?>>ندارد</option>
                                            <option value="1" <?= oldOr("parking", $advertise->parking) == "1"  ? "selected" : "" ?>>دارد</option>
                                        </select>
                                        <?= errorText("parking") ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="type">نوع ملک</label>
                                        <select name="type" class="form-control <?= errorClass("type") ?>">
                                            <option value="0" <?= oldOr("type", $advertise->type) == "0"  ? "selected" : "" ?>>آپارتمان</option>
                                            <option value="1" <?= oldOr("type", $advertise->type) == "1"  ? "selected" : "" ?>>ویلایی</option>
                                            <option value="2" <?= oldOr("type", $advertise->type) == "2"  ? "selected" : "" ?>>زمین</option>
                                            <option value="3" <?= oldOr("type", $advertise->type) == "3"  ? "selected" : "" ?>>سوله</option>
                                        </select>
                                        <?= errorText("type") ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6 mb-4">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="sell_status">نوع آگهی</label>
                                        <select name="sell_status" class="form-control <?= errorClass("sell_status") ?>">
                                            <option value="0" <?= oldOr("sell_status", $advertise->sell_status) == "0"  ? "selected" : "" ?>>خرید</option>
                                            <option value="1" <?= oldOr("sell_status", $advertise->sell_status) == "1"  ? "selected" : "" ?>>اجاره</option>
                                        </select>
                                        <?= errorText("sell_status") ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <div class="form-group">
                                        <label for="cat_id">دسته</label>
                                        <select name="cat_id" class="form-control <?= errorClass("cat_id") ?>">
                                            <?php foreach ($categories as $category) {  ?>
                                                <option value="<?= $category->id ?>" <?= oldOr("cat_id", $advertise->cat_id) == $category->id ? "selected" : "" ?>> <?= e($category->name) ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= errorText("cat_id") ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <section class="form-group">
                                    <button type="submit" class="btn btn-outline-dark mt-4">ویرایش خبر</button>
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
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        images_upload_url: '<?= route("file.image.upload") ?>',
        language: 'fa_IR',
        skin: 'oxide-dark',
        content_css: 'dark' // > **Note**: This feature is only available for TinyMCE 5.1 and later.
    });
</script>
@endsection