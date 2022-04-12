@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|News|Index</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h5 class="fw-bold">بخش کامنت ها</h5>
            </div>
            <div class="body-content">
                <div class="table-responsive border border-dark p-3 rounded">
                    <table class="table zero-configuration grid-table">
                        <thead>
                            <tr>
                                <th>شماره</th>
                                <th>کاربر</th>
                                <th>نظر</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($comments as $comment) { ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $i ?></td>
                                    <td><?= e($comment->user()->first_name) . " " . e($comment->user()->last_name) ?></td>
                                    <td><?= limitDotPrint(e($comment->comment), 30) ?></td>
                                    <td>
                                        <a href="<?= route("admin.comment.show", [$comment->id]) ?>" class="text-primary ms-3"><i class="bi bi-eye-fill"></i></a>
                                        <span onclick="approvedToggle(this, <?= $comment->id ?>)" class="c-pointer ms-2 <?= $comment->approved == 0 ? "text-success" : "text-danger" ?>"><?= $comment->approved == 0 ? "فعال کردن" : "غیر فعال کردن" ?></span>
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
    const approvedToggle = (elem, id) => {
        axios.put(`/admin/comment/approved/update/${id}`)
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