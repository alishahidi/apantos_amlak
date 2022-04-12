@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|Category|Edit</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h4 class="fw-bold">دسته بندی</h4>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= backUrl() ?>" class="btn btn-secondary">بازگشت</a>
                </div>
                <div class="border border-dark p-3 rounded">
                    <form class="row" action="<?= route("admin.category.update", [$category->id]) ?>" method="post" enctype="multipart/form-data">
                        @token
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="helperText">نام دسته</label>
                                    <input value="<?= e(oldOr("name", e($category->name))) ?>" name="name" type="text" id="helperText" class="form-control <?= errorClass("name") ?>" placeholder="نام ...">
                                    <?= errorText("name") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <div class="form-group">
                                    <label for="helperText">دسته والد (اختیاری)</label>
                                    <select name="parent_id" class="select2 form-control <?= errorClass("parent_id") ?>">
                                        <option value="">ندارد</option>
                                        <?php foreach ($categories as $ob_category) {  ?>
                                            <option value="<?= $ob_category->id ?>" <?= oldOr("parent_id", $category->parent_id) == $ob_category->id ? "selected" : "" ?>> <?= e($ob_category->name) ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= errorText("parent_id") ?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <button type="submit" class="btn btn-outline-dark mt-4">ویرایش دسته بندی</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection