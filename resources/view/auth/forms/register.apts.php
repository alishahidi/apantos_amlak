@extends('auth.layouts.app')

@section('head-tag')
<title>Register</title>
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
      <h3>ثبت نام در سایت</h3>
      <p>
        تمامی اطلاعات امنیتی شما همچون پسورد به روش رمزنگاری برگشت ناپذیر ذخیره
        شده بنابر این با خیالت راحت پسورد خود را قرار دهید
      </p>
    </section>
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
    <form action="<?= route("auth.register") ?>" method="POST" enctype="multipart/form-data">
      @token
      <div class="mb-4">
        <label for="first_name" class="form-label">نام</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= e(old("first_name")) ?>" />
      </div>
      <div class="mb-4">
        <label for="last_name" class="form-label">نام خانوادگی</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= e(old("last_name")) ?>" />
      </div>
      <div class="mb-4">
        <label for="email" class="form-label">آدرس ایمیل</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= e(old("email")) ?>" />
      </div>
      <div class="row mb-4">
        <div class="col-md-6 mx-md-4">
          <label for="avatar">اپلود تصویر </label>
          <section class="inputfile-box mt-3">
            <input type="file" id="file" name="avatar" class="inputfile form-control-file" onchange="uploadFile(this)" accept="image/png, image/jpeg, image/gif" />
            <label for="file" class="
                uploade-input
                d-flex
                flex-column
                justify-content-center
                align-items-center
                c-pointer
                w-100
                file-input-fill
              ">
              <span> انتخاب فایل </span>
              <span id="file-name" class="file-box text-center">
                png و jpg فرمت های قابل قبول</span>
              <span></span>
            </label>
            <section class="clear-fix"></section>
          </section>
        </div>
        <div class="col-md-6">
          <label for="image">پیش نمایش عکس</label>
          <section class="col-md-12 d-flex justify-content-center mt-3">
            <img id="image" src="" class="image-preview" />
          </section>
        </div>
      </div>
      <div class="mb-4">
        <label for="password" class="form-label">پسورد</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= e(old("password")) ?>" />
      </div>
      <div class="mb-4">
        <label for="confirm_password" class="form-label">تکرار پسورد</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?= e(old("confirm_password")) ?>" />
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
        <div><a href="<?= route("auth.login") ?>">وارد شدن</a></div>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-4">ثبت نام</button>
    </form>
  </section>
  <section class="col-md-7 is-bg bg-register"></section>
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