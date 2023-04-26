<?php

use Illuminate\Support\Facades\Route;

Route::group([], function() {
    $front = [
        'namespace' => 'App\Http\Controllers\Front',
    ];
    Route::group($front, function () {
        Route::get('/',['uses' => 'IndexController@index','as' => 'front-index']);
        Route::post('/footer/message',['uses' => 'IndexController@footerMessage','as' => 'front-footer-message']);
        Route::get('/contact',['uses' => 'IndexController@contact','as' => 'front-contact']);
        Route::get('/shop',['uses' => 'IndexController@shop','as' => 'front-shop']);
        Route::get('/shop/{id?}',['uses' => 'IndexController@shopProducts','as' => 'front-shop-products']);
        Route::post('/shop/search',['uses' => 'IndexController@shopSearch','as' => 'front-shop-search']);
        Route::get('/shop/product/{id}',['uses' => 'IndexController@shopProduct','as' => 'front-shop-product']);
        Route::post('/shop/product/delete/{id}/{cookie_id?}',['uses' => 'IndexController@delete_cart_item','as' => 'front-shop-product-delete']);
        Route::get('/cart',['uses' => 'IndexController@cart','as' => 'front-shop-cart']);
        Route::get('/checkout',['uses' => 'IndexController@checkout','as' => 'front-shop-checkout']);
        Route::get('/blog',['uses' => 'IndexController@blog','as' => 'front-blog']);
        Route::get('/blog/article/{id}',['uses' => 'IndexController@blogArticle','as' => 'front-blog-article']);
        Route::post('/blog/search/{search}',['uses' => 'IndexController@blogSearch','as' => 'front-blog-search']);
        Route::post('/subscribe/{id}',['uses' => 'IndexController@subscribe','as' => 'front-subscribe']);
    });
});
Route::group(['middleware' => ['auth', 'web']], function() {
    $back = [
        'namespace' => 'App\Http\Controllers\Back',
    ];
    Route::group($back, function () {
        $user = [
            'namespace' => '\App\Http\Controllers\Back\User',
            'prefix' => 'user',
        ];
        Route::group($user, function () {
            Route::get('/', ['uses' => 'IndexController@index', 'as' => 'back-user-index']);
            Route::get('/settings', ['uses' => 'IndexController@settings', 'as' => 'back-user-settings']);
            Route::get('/profile', ['uses' => 'IndexController@profile', 'as' => 'back-user-profile']);
            //Free Courses
            Route::get('/free/courses', ['uses' => 'FreeCoursesController@index', 'as' => 'back-free-courses-index']);
            Route::get('/free/course/{id}', ['uses' => 'FreeCoursesController@singleCourse', 'as' => 'back-free-course-index']);
            Route::post('/free/course/{course_id}/{id}', ['uses' => 'FreeCoursesController@openSingleCourse', 'as' => 'back-open-free-course-index']);
            //Pay Courses
            Route::get('/pay/courses', ['uses' => 'PayCoursesController@index', 'as' => 'back-pay-courses-index']);
            Route::get('/pay/course/{id}', ['uses' => 'PayCoursesController@singleCourse', 'as' => 'back-pay-course-index']);
            Route::post('/pay/course/{course_id}/{id}', ['uses' => 'PayCoursesController@openSingleCourse', 'as' => 'back-open-pay-course-index']);
            //Buy
            Route::get('/buy/courses', ['uses' => 'BuyCoursesController@index', 'as' => 'back-buy-courses-index']);

            Route::post('/free/course/task',['uses' => 'FreeCoursesController@task','as' => 'back-free-course-task']);
            Route::post('/profile/edit/avatar',['uses' => 'ProfileController@editProfileAvatar','as' => 'back-user-profile-edit-avatar']);
            Route::post('/profile/edit',['uses' => 'ProfileController@editProfile','as' => 'back-user-profile-edit']);
            Route::post('/profile/delete',['uses' => 'ProfileController@deleteUser','as' => 'back-user-profile-delete']);
            Route::post('/profile/new/password',['uses' => 'ProfileController@newPassword','as' => 'back-user-profile-new-password']);
        });
    });
});
Route::group(['middleware' => ['auth', 'web','checkAdmin']], function() {
    $back = [
        'namespace' => 'App\Http\Controllers\Back',
    ];
    Route::group($back, function () {
        $user = [
            'namespace' => '\App\Http\Controllers\Back\Admin',
            'prefix' => 'admin',
        ];
        Route::group($user, function () {
            Route::get('/', ['uses' => 'IndexController@index', 'as' => 'back-admin-index']);
        });
    });
});
Auth::routes();




