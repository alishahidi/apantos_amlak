@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|News|Index</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h5 class="fw-bold">بخش اخبار</h5>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= route("admin.news.create") ?>" class="btn btn-secondary">ایجاد خبر</a>
                </div>
                <div class="table-responsive border border-dark p-3 rounded">
                    <table class="table zero-configuration grid-table">
                        <thead>
                            <tr>
                                <th>شماره</th>
                                <th>ایمیل</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>تصویر</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($users as $user) { ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $i ?></td>
                                    <td><?= e($user->email) ?></td>
                                    <td><?= e($user->first_name) ?></td>
                                    <td><?= e($user->last_name) ?></td>
                                    <td><img style="width: 90px;" src="<?= asset($user->avatar ) ?>" alt=""></td>
                                    <td>
                                        <a href="<?= route("admin.user.edit", [$user->id]) ?>" class="text-success ms-3"><i class="bi bi-pencil-fill"></i></a>
                                        <span onclick="activeToggle(this, <?= $user->id ?>)" class="c-pointer ms-2 <?= $post->is_active == 0 ? "text-danger" : "text-success" ?>"><?= $user->is_active == 0 ? "تایید کردن" : "غیر تایید کردن" ?></span>
                                        <span onclick="statusToggle(this, <?= $user->id ?>)" class="c-pointer ms-2 <?= $post->status == 0 ? "text-danger" : "text-success" ?>"><?= $user->status == 0 ? "فعال کردن" : "غیر فعال کردن" ?></span>
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

@section('scripts')
<script>
    const activeToggle = (elem, id) => {
        axios.put(`/admin/user/active/update/${id}`)
            .then(function(response) {
                if (response.status) {
                    elem.classList.remove("text-danger");
                    elem.classList.remove("text-success");
                    elem.classList.add(response.data.class);
                    elem.innerHTML = response.data.inner;
                    Toast.fire({
                        icon: 'success',
                        title: `با موفقیت ${response.data.alertInner} شد.`
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

    const statusToggle = (elem, id) => {
        axios.put(`/admin/user/status/update/${id}`)
            .then(function(response) {
                if (response.status) {
                    elem.classList.remove("text-danger");
                    elem.classList.remove("text-success");
                    elem.classList.add(response.data.class);
                    elem.innerHTML = response.data.inner;
                    Toast.fire({
                        icon: 'success',
                        title: `با موفقیت ${response.data.alertInner} شد.`
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