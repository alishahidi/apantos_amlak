@extends('auth.layouts.app')

@section('head-tag')
<title>Reset-Password</title>
@endsection

@section('content')
<section class="row w-100 h-100 position-fixed g-0 d-flex justify-content-between">
  <section class="
      col-md-4
      d-flex
      flex-column
      align-content-center
      mx-auto
      h-100
      scroll-hide
      py-5
    ">
    <section class="form-header">
      <h3>تغییر کلمه عبور</h3>
      <p>لطفا کلمه عبور جدید را وارد کنید.</p>
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
    <form action="<?= route("auth.reset.password", [$token]) ?>" method="POST">
      @token
      <div class="mb-4">
        <label for="password" class="form-label">پسورد</label>
        <input type="password" name="password" class="form-control" id="password" />
      </div>
      <div class="mb-4">
        <label for="confirm_password" class="form-label">تکرار پسورد</label>
        <input type="password" name="confirm_password" class="form-control" id="confirm_password" />
      </div>
      <div class="mb-4">
        <label for="captcha" class="form-label">کد امنیتی</label>
        <div class="input-group mb-3 rounded">
          <input type="text" class="form-control rounded-0" name="captcha" id="captcha" aria-describedby="captcha-img" placeholder="کد امنیتی">
          <span class="input-group-text ms-0 rounded-0 border-end-0 position-relative" id="captcha-img">
            <img class="captcha-img" src="<?= route("captcha.get") ?>" alt="captcha">
            <span class="position-absolute captcha-refresh c-pointer" onclick="captchaRefrash()">
              <i class="bi bi-arrow-clockwise"></i>
            </span>
          </span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-4">
        تغییر کلمه عبور
      </button>
    </form>
  </section>
  <section class="col-md-7 is-bg bg-pass"></section>
</section>
@endsection

@section('scripts')
<script>
  const captchaRefrash = () => {
    let refreshUrl = "<?= route("captcha.get") ?>?" + Date.now();;
    console.log(refreshUrl);
    document.querySelector(".captcha-img").src = refreshUrl;
  };
</script>
@endsection