@extends('auth.layouts.app')

@section('head-tag')
<title>Reset-Code</title>
@endsection

@section('content')
<section class="row w-100 h-100 position-fixed g-0 d-flex justify-content-between">
    <section class="col-md-7 is-bg bg-code">
    </section>
    <section class="col-md-4 d-flex flex-column align-content-center mx-auto h-100 scroll-hide py-5">
        <section class="form-header">
            <h3>بازیابی رمز عبور</h3>
            <p>ایمیل اکانت خود را وارد کنید ایمیلی حاوی لینک تغییر رمز عبور برای شما ارسال خواهد شد.</p>
        </section>
        <?php if (flashExists()) { ?>
            <section class="alert alert-success">
                <p>پیغام سیستم (<?= flashExists() ?>)</p>
                <hr>
                <ul class="list-group-numbered">
                    <?php foreach (allFlashes() as $flash) { ?>
                        <li><?= e($flash) ?></li>
                    <?php } ?>
                </ul>
            </section>
        <?php } ?>
        <?php if (errorExists()) { ?>
            <section class="alert alert-danger">
                <p>پیغام سیستم (<?= errorExists() ?>)</p>
                <hr>
                <ul class="list-group-numbered">
                    <?php foreach (allErrors() as $error) { ?>
                        <li><?= e($error) ?></li>
                    <?php } ?>
                </ul>
            </section>
        <?php } ?>
        <form action="<?= route("auth.forgot") ?>" method="POST">
            @token
            <div class="mb-4">
                <label for="email" class="form-label">آدرس ایمیل</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-4">ارسال لینک بازیابی</button>
        </form>
    </section>
</section>
@endsection