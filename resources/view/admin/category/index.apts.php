@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|Category|Index</title>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h5 class="fw-bold">دسته بندی</h5>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= route("admin.category.create") ?>" class="btn btn-secondary">ایجاد دسته بندی</a>
                </div>
                <div class="table-responsive border border-dark p-3 rounded">
                    <table class="table grid-table">
                        <thead>
                            <tr>
                                <th>شماره</th>
                                <th>نام</th>
                                <th>دسته والد</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($categories as $category) {  ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $i ?></td>
                                    <td><?= e($category->name) ?></td>
                                    <td><?= e(setOr($category->parent()->name, "ندارد")) ?></td>
                                    <td>
                                        <a href="<?= route("admin.category.edit", [$category->id]) ?>" class="text-success ms-3"><i class="bi bi-pencil-fill"></i></a>
                                        <form class="d-inline" action="<?= route("admin.category.delete", [$category->id]) ?>" method="post" onclick="return confirm('آیا مایلید <?= e($category->name) ?> حذف شود؟')">
                                            <input type="hidden" name="_method" value="delete">
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