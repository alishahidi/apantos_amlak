@extends('admin.layouts.app')

@section('head-tag')
<title>Admin|News|Create</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-body-container">
            <div class="main-body-container-header">
                <h4 class="fw-bold">کامنت</h4>
            </div>
            <div class="body-content">
                <div class="mb-4">
                    <a href="<?= route("admin.comment.index") ?>" class="btn btn-secondary">بازگشت</a>
                </div>
                <section class="row my-5">
                    <div class="col-md-6 p-3 rounded mx-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="w-100 rounded-circle" src="<?= asset($comment->user()->avatar) ?>" alt="User avatar">
                            </div>
                            <div class="col-md-9 d-flex flex-column justify-content-center align-items-start">
                                <div>
                                    <h5 class="text-dark"><?= e($comment->user()->first_name) . " " . e($comment->user()->last_name) ?></h5>
                                </div>
                                <div>
                                    <p class="text-muted"><?= e($comment->user()->email) ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h4 class="mb-4 text-dark">متن کامنت: </h4>
                            <p><?= e($comment->comment) ?></p>
                        </div>
                    </div>
                </section>
                <div class="border border-dark p-3 rounded">
                    <form class="row" action="<?= route("admin.comment.anser", [$comment->id]) ?>" method="post" enctype="multipart/form-data">
                        @token
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label for="comment" class="mb-2">پاسخ: </label>
                                    <textarea class="<?= errorClass("comment") ?>" name="comment" id="comment"><?= old("comment") ?></textarea>
                                    <?= errorText("comment") ?>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <section class="form-group">
                                    <button type="submit" class="btn btn-outline-dark mt-4">پاسخ</button>
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
        images_upload_url: '<?= route("file.image.upload") ?>?_token=<?= get_start_random_ip_token(); ?>',
        language: 'fa_IR',
        skin: 'oxide-dark',
        content_css: 'dark',
    });
</script>
@endsection