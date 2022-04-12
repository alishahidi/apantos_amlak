@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|Category|Index</title>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h5 class="fw-bold">آگهی</h5>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= route("admin.ads.create") ?>" class="btn btn-secondary">ایجاد آگهی</a>
                </div>
                <div class="table-responsive border border-dark p-3 rounded">
                    <table class="table grid-table">
                        <thead>
                            <tr>
                                <th>شماره</th>
                                <th>عنوان</th>
                                <th>دسته</th>
                                <th>آدرس</th>
                                <th>تصویر</th>
                                <th>مشخصات</th>
                                <th>تگ</th>
                                <th>کاربر</th>
                                <th style="width: 22rem;">تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($ads as $advertise) { ?>
                                <tr>
                                    <td class="sorting_1"><?= $i ?></td>
                                    <td><?= e($advertise->title) ?></td>
                                    <td><?= e($advertise->category()->name) ?></td>
                                    <td><?= e($advertise->address) ?></td>
                                    <td><img style="width: 90px;" src="<?= asset($advertise->image) ?>" alt=""></td>
                                    <td>
                                        <ul>
                                            <li>floor : <?= e($advertise->floor) ?></li>
                                            <li>year : <?= e($advertise->year) ?></li>
                                            <li>storeroom : <?= e($advertise->storeroom) ?></li>
                                            <li>balcony : <?= e($advertise->balcony) ?></li>
                                            <li>area : <?= e($advertise->area) ?></li>
                                            <li>room : <?= e($advertise->room) ?></li>
                                            <li>toilet : <?= e($advertise->toilet) ?></li>
                                            <li>parking : <?= e($advertise->parking) ?></li>
                                        </ul>
                                    </td>
                                    <td><?= e($advertise->tag) ?></td>
                                    <td><?= e($advertise->user()->first_name) . " " . e($advertise->user()->last_name) ?></td>
                                    <td style="width: 22rem;">
                                        <a href="<?= route("admin.ads.gallery", [$advertise->id]) ?>" class="text-primary ms-3"><i class="bi bi-images"></i></a>
                                        <a href="<?= route("admin.ads.edit", [$advertise->id]) ?>" class="text-success ms-3"><i class="bi bi-pencil-fill"></i></a>
                                        <form class="d-inline" action="<?= route("admin.ads.delete", [$advertise->id]) ?>" method="post" onclick="return confirm('آیا مایلید <?= e($post->name) ?> حذف شود؟')">
                                            @method('DELETE')
                                            <button><i class="bi bi-trash text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection