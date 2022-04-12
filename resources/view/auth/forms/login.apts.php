@extends('auth.layouts.app')

@section('head-tag')
<title>Login</title>
@endsection

@section('content')
<section class="row w-100 h-100 position-fixed g-0 d-flex justify-content-between">
  <section class="col-md-7 is-bg bg-login"></section>
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
      <h3>ورود به سایت</h3>
      <p>به سایت ما خوش آمدی دوست عزیز</p>
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
    <form action="<?= route("auth.login") ?>" method="POST">
      @token
      <div class="mb-4">
        <label for="email" class="form-label">آدرس ایمیل</label>
        <input type="email" class="form-control" id="email" name="email" <?= e(old("email")) ?> />
      </div>
      <div class="mb-4">
        <label for="password" class="form-label">پسورد</label>
        <input type="password" class="form-control" id="password" name="password" <?= e(old("password")) ?> />
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
      <div class="form-options d-flex justify-content-between">
        <div class="form-check">
          <label class="form-check-label" for="remember">مرا بخاطر بسپار</label>
          <input type="checkbox" class="form-check-input" name="remember" id="remember" />
        </div>
        <div><a href="<?= route("auth.register") ?>">ثبت نام</a> / <a href="<?= route("auth.forgot") ?>">فراموشی رمز عبور</a></div>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-4">ورود</button>
    </form>
  </section>
</section>
@endsection

@section('scripts')
<script>
  const captchaRefrash = () => {
    let refreshUrl = "<?= route("captcha.get") ?>?" + Date.now();;
    document.querySelector(".captcha-img").src = refreshUrl;
  };
</script>
@endsection