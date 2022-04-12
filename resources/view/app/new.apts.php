@extends('app.layouts.app')

@section('head-tag')
<title>املاک - <?= $new->title ?></title>
@endsection

@section('content')
<div class="hero-wrap" style="background-image: url('<?= asset($new->image) ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?= route("home.index") ?>">خانه</a></span> <span class="mr-2"><a href="<?= route("home.news.all") ?>">اخبار</a></span> <span>صفحه
                        داخلی خبر</span></p>
                <h1 class="mb-3 bread">خبر</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3"><?= e($new->title) ?></h2>
                <?= d($new->body) ?>

                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">مسکن</a>
                        <a href="#" class="tag-cloud-link">فروش</a>
                        <a href="#" class="tag-cloud-link">اخبار</a>
                    </div>
                </div>


                <div class="pt-5 mt-5">
                    <h3 class="mb-5">نظرات</h3>
                    <ul class="comment-list">
                        <?php foreach ($comments as $comment) { ?>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="<?= asset($comment->user()->avatar) ?>" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3><?= e($comment->user()->first_name) . " " . e($comment->user()->last_name) ?></h3>
                                    <div class="meta"><?= jdate(e($comment->created_at))->format("%A, %d %B %y") ?></div>
                                    <p><?= e($comment->comment) ?></p>
                                    <p><a href="#" class="reply">پاسخ</a></p>
                                </div>
                                <?php $childsComment = $comment->child()->get();
                                if (!empty($childsComment)) { ?>
                                    <ul class="children">
                                        <?php foreach ($childsComment as $childComment) { ?>
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="<?= asset($childComment->user()->avatar) ?>" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3><?= e($childComment->user()->first_name) . " " . e($childComment->user()->last_name) ?></h3>
                                                    <div class="meta"><?= jdate(e($childComment->created_at))->format("%A, %d %B %y") ?></div>
                                                    <p><?= e($childComment->comment) ?></p>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                        <!-- <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>نیما کریمی</h3>
                                <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                <p>خیلی عالی بود ممنون</p>
                                <p><a href="#" class="reply">پاسخ</a></p>
                            </div>

                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>نیما کریمی</h3>
                                        <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                        <p>خیلی عالی بود ممنون</p>
                                        <p><a href="#" class="reply">پاسخ</a></p>
                                    </div>


                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="images/person_1.jpg" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>نیما کریمی</h3>
                                                <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                                <p>خیلی عالی بود ممنون</p>
                                                <p><a href="#" class="reply">پاسخ</a></p>
                                            </div>
                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>نیما کریمی</h3>
                                                        <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                                        <p>خیلی عالی بود ممنون</p>
                                                        <p><a href="#" class="reply">پاسخ</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <?php if (\System\Auth\Auth::checkLogin()) { ?>
                            <h3 class="mb-5">درج نظر</h3>
                            <form action="<?= route("home.news.comment", [$new->id]) ?>" class="p-5 bg-light" method="POST">
                                @token
                                <div class="form-group">
                                    <label for="message">پیام</label>
                                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="ارسال نطر" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        <?php } else { ?>
                            <p>برای درج نظر ابتدا وارد شوید.</p>
                            <a href="<?= route("auth.login.view") ?>" class="btn btn-success m-2"><span class="icon-user m-2"></span>ورود</a>
                            <a href="<?= route("auth.login.view") ?>" class="btn btn-primary"><span class="icon-pencil m-2 m-2"></span>ثبت نام</a>
                        <?php } ?>
                    </div>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">

                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>دسته بندی ها</h3>
                        <?php foreach ($categories as $category) { ?>
                            <li><a href="<?= route("home.category", [$category->id, $category->name]) ?>"><?= $category->name ?> <span>(<?= count(array($category->ads())) ?>)</span></a></li>
                        <?php } ?>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>اخرین بلاگ ها</h3>
                    <?php foreach ($relatedNews as $new) { ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url('<?= asset($new->image) ?>');"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#"><?= e($new->title) ?></a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> <?= jdate(e($new->created_at))->format("%A, %d %B %y") ?></a></div>
                                    <div><a href="#"><span class="icon-person"></span> <?= e($new->user()->first_name) . " " . e($new->user()->last_name) ?></a></div>
                                    <div><a href="#"><span class="icon-chat"></span> <?= count($array(new->comments())) ?></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</section>

@endsection
