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
                                <th>عنوان</th>
                                <th>دسته</th>
                                <th>نویسنده</th>
                                <th>تصویر</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($posts as $post) { ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $i ?></td>
                                    <td><?= e($post->title) ?></td>
                                    <td><?= e($post->category()->name) ?></td>
                                    <td><?= e($post->user()->first_name) . " " . e($post->user()->last_name) ?></td>
                                    <td><img style="width: 90px;" src="<?= asset($post->image) ?>" alt=""></td>
                                    <td>
                                        <a href="<?= route("admin.news.edit", [$post->id]) ?>" class="text-success ms-3"><i class="bi bi-pencil-fill"></i></a>
                                        <span onclick="statusToggle(this, <?= $post->id ?>)" class="c-pointer ms-2 <?= $post->status == 0 ? "text-success" : "text-danger" ?>"><?= $post->status == 0 ? "فعال کردن" : "غیر فعال کردن" ?></span>
                                        <form class="d-inline" action="<?= route("admin.news.delete", [$post->id]) ?>" method="post" onclick="return confirm('آیا مایلید <?= e($post->name) ?> حذف شود؟')">
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

@section('scripts')
<script>
    const statusToggle = (elem, id) => {
        axios.put(`/admin/news/status/update/${id}`)
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