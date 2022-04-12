<?php

use System\Router\Web\Route;

Route::get('/captcha/get', 'Captcha\CaptchaController@get', 'captcha.get');

// Ckeditor Routes
Route::post("/file/image/upload", "File\ImageController@upload", "file.image.upload");

// Admin Routes
Route::get('/admin', 'Admin\AdminController@index', 'admin.index');

// Category Routes
Route::get("/admin/category", "Admin\CategoryController@index", "admin.category.index");
Route::get("/admin/category/create", "Admin\CategoryController@create", "admin.category.create");
Route::post("/admin/category/store", "Admin\CategoryController@store", "admin.category.store");
Route::get("/admin/category/edit/{id}", "Admin\CategoryController@edit", "admin.category.edit");
Route::put("/admin/category/update/{id}", "Admin\CategoryController@update", "admin.category.update");
Route::delete("/admin/category/delete/{id}", "Admin\CategoryController@destroy", "admin.category.delete");

// News Routes
Route::get("/admin/news", "Admin\NewsController@index", "admin.news.index");
Route::get("/admin/news/create", "Admin\NewsController@create", "admin.news.create");
Route::post("/admin/news/store", "Admin\NewsController@store", "admin.news.store");
Route::get("/admin/news/edit/{id}", "Admin\NewsController@edit", "admin.news.edit");
Route::put("/admin/news/update/{id}", "Admin\NewsController@update", "admin.news.update");
Route::delete("/admin/news/delete/{id}", "Admin\NewsController@destroy", "admin.news.delete");
Route::put("/admin/news/status/update/{id}", "Admin\NewsController@updateStatus", "admin.news.status.update");

// Ads Routes
Route::get("/admin/ads", "Admin\AdsController@index", "admin.ads.index");
Route::get("/admin/ads/create", "Admin\AdsController@create", "admin.ads.create");
Route::post("/admin/ads/store", "Admin\AdsController@store", "admin.ads.store");
Route::get("/admin/ads/edit/{id}", "Admin\AdsController@edit", "admin.ads.edit");
Route::put("/admin/ads/update/{id}", "Admin\AdsController@update", "admin.ads.update");
Route::delete("/admin/ads/delete/{id}", "Admin\AdsController@destroy", "admin.ads.delete");
Route::get("/admin/ads/gallery/{id}", "Admin\AdsController@gallery", "admin.ads.gallery");
Route::post("/admin/ads/store-gallery-image/{gallery_id}", "Admin\AdsController@storeGalleryImage", "admin.ads.store.gallery.image");
Route::delete("/admin/ads/delete-gallery-image/{gallery_id}", "Admin\AdsController@deleteGalleryImage", "admin.ads.delete.gallery.image");

// Slide Routes
Route::get("/admin/slide", "Admin\SlideController@index", "admin.slide.index");
Route::get("/admin/slide/create", "Admin\SlideController@create", "admin.slide.create");
Route::post("/admin/slide/store", "Admin\SlideController@store", "admin.slide.store");
Route::get("/admin/slide/edit/{id}", "Admin\SlideController@edit", "admin.slide.edit");
Route::put("/admin/slide/update/{id}", "Admin\SlideController@update", "admin.slide.update");
Route::delete("/admin/slide/delete/{id}", "Admin\SlideController@destroy", "admin.slide.delete");

// Comment Routes
Route::get("/admin/comment", "Admin\CommentController@index", "admin.comment.index");
Route::get("/admin/comment/show/{id}", "Admin\CommentController@show", "admin.comment.show");
Route::post("/admin/comment/anser/{id}", "Admin\CommentController@anser", "admin.comment.anser");
Route::put("/admin/comment/approved/update/{id}", "Admin\CommentController@updateApproved", "admin.comment.approved.update");

// User Routes
Route::get("/admin/user", "Admin\UserController@index", "admin.user.index");
Route::get("/admin/user/create/{id}", "Admin\UserController@create", "admin.user.create");
Route::post("/admin/user/store/{id}", "Admin\UserController@store", "admin.user.store");
Route::get("/admin/user/edit/{id}", "Admin\UserController@edit", "admin.user.edit");
Route::put("/admin/user/update/{id}", "Admin\UserController@update", "admin.user.update");
Route::put("/admin/user/active/update/{id}", "Admin\UserController@updateActive", "admin.user.active.update");
Route::put("/admin/user/status/update/{id}", "Admin\UserController@updateStatus", "admin.user.status.update");

// Auth Routes
Route::get("/login", "Auth\LoginController@view", "auth.login.view");
Route::post("/login", "Auth\LoginController@login", "auth.login");
Route::get("/register", "Auth\RegisterController@view", "auth.register.view");
Route::post("/register", "Auth\RegisterController@register", "auth.register");
Route::get("/activation/{token}", "Auth\RegisterController@activation", "auth.activation");
Route::get("/forgot", "Auth\ForgotController@view", "auth.forgot.view");
Route::post("/forgot", "Auth\ForgotController@forgot", "auth.forgot");
Route::get("/reset/password/{token}", "Auth\ResetPasswordController@view", "auth.reset.password.view");
Route::post("/reset/password/{token}", "Auth\ResetPasswordController@resetPassword", "auth.reset.password");
Route::get("/logout", "Auth\LogoutController@logout", "auth.logout");


// Home Controller
Route::get("/", "Home\HomeController@index", "home.index");
Route::get("/home", "Home\HomeController@index", "home.home");
Route::get("/about", "Home\HomeController@about", "home.about");
Route::get("/ads", "Home\HomeController@allAds", "home.ads.all");
Route::get("/ads/{id}/{slug}", "Home\HomeController@ads", "home.ads");
Route::get("/news", "Home\HomeController@allNews", "home.news.all");
Route::get("/news/{id}/{slug}", "Home\HomeController@news", "home.news");
Route::post("/news/{id}/comment", "Home\HomeController@comment", "home.news.comment");
Route::get("/category/{id}/{slug}", "Home\HomeController@category", "home.category");
Route::get("/search", "Home\HomeController@search", "home.search");