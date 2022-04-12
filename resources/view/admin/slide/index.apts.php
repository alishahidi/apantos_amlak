@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|Slide|Index</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h5 class="fw-bold">بخش اسلاید</h5>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= route("admin.slide.create") ?>" class="btn btn-secondary">ایجاد اسلاید</a>
                </div>
                <div class="table-responsive border border-dark p-3 rounded">
                    <table class="table zero-configuration grid-table">
                        <thead>
                            <tr>
                                <th>شماره</th>
                                <th>عنوان</th>
                                <th>لینک</th>
                                <th>آدرس</th>
                                <th>مبلغ</th>
                                <th>تصویر</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($slides as $slide) { ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $i ?></td>
                                    <td><?= e($slide->title) ?></td>
                                    <td><a href="<?= e($slide->link) ?>" target="_blank" rel="noopener noreferrer"><?= e($slide->link) ?></a></td>
                                    <td><?= e($slide->address) ?></td>
                                    <td><?= e($slide->amount) ?></td>
                                    <td><img style="width: 90px;" src="<?= asset($slide->image) ?>" alt=""></td>
                                    <td>
                                        <a href="<?= route("admin.slide.edit", [$slide->id]) ?>" class="text-success ms-3"><i class="bi bi-pencil-fill"></i></a>
                                        <form class="d-inline" action="<?= route("admin.slide.delete", [$slide->id]) ?>" method="post" onclick="return confirm('آیا مایلید <?= e($slide->name) ?> حذف شود؟')">
                                            @method('DELETE')
                                            <button><i class="bi bi-trash text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection