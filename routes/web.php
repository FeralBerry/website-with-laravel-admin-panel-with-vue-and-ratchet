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
            //Просмотр и редактирование информации о пользователях и их ролях
            Route::match(['GET','POST'],'/users', ['uses' => 'IndexController@users', 'as' => 'back-admin-users-index']);
            //Просмотр и редактирование информации СЕО
            Route::get('/seo', ['uses' => 'IndexController@seo', 'as' => 'back-admin-seo-index']);
            Route::post('/seo/edit/{id}', ['uses' => 'IndexController@seoEdit', 'as' => 'back-admin-seo-edit']);
            Route::post('/seo/add', ['uses' => 'IndexController@seoAdd', 'as' => 'back-admin-seo-add']);
            Route::post('/seo/delete/{id}', ['uses' => 'IndexController@seoDelete', 'as' => 'back-admin-seo-delete']);
            //Просмотр и редактирование контактной информации
            Route::get('/contact', ['uses' => 'IndexController@contact', 'as' => 'back-admin-contact-index']);
            Route::post('/contact/edit/{name}', ['uses' => 'IndexController@contactEdit', 'as' => 'back-admin-contact-edit']);
            //Промотр и редактирование навигации на главной странице
            Route::get('/navigate', ['uses' => 'IndexController@navigate', 'as' => 'back-admin-navigate-index']);
            //Просмотр и редактирование слайдеров на главной странице
            Route::get('/slider', ['uses' => 'SlidersController@slider', 'as' => 'back-admin-slider-index']);
            Route::get('/faq_slider', ['uses' => 'SlidersController@faq_slider', 'as' => 'back-admin-faq_slider-index']);
            //Просмотр вопросов заданых от пользователей
            Route::get('/user_question', ['uses' => 'IndexController@user_question', 'as' => 'back-admin-user_question-index']);
            Route::post('/footer_message/delete/{id}', ['uses' => 'IndexController@footer_message_delete', 'as' => 'back-admin-footer_message-delete']);
            Route::post('/question/delete/{id}', ['uses' => 'IndexController@question_delete', 'as' => 'back-admin-question-delete']);
            //Цитаты
            Route::get('/quotes',['uses' => 'QuotesController@index', 'as' => 'back-admin-quotes-index']);
            Route::post('/quotes/edit/{id}',['uses' => 'QuotesController@edit', 'as' => 'back-admin-quotes-edit']);
            Route::post('/quotes/add',['uses' => 'QuotesController@add', 'as' => 'back-admin-quotes-add']);
            Route::post('/quotes/delete/{id}',['uses' => 'QuotesController@delete', 'as' => 'back-admin-quotes-delete']);
            //Маршруты редактирования и просмотра блога
            Route::get('/blog', ['uses' => 'BlogController@index', 'as' => 'back-admin-blog-index']);
            Route::get('/blog/add', ['uses' => 'BlogController@add', 'as' => 'back-admin-blog-add']);
            Route::post('/blog_add', ['uses' => 'BlogController@blog_add', 'as' => 'back-admin-blog_add']);
            Route::get('/blog/edit/{id}', ['uses' => 'BlogController@edit', 'as' => 'back-admin-blog-edit']);
            Route::post('/blog_edit/{id}', ['uses' => 'BlogController@blog_edit', 'as' => 'back-admin-blog_edit']);
            Route::get('/blog/delete/{id}', ['uses' => 'BlogController@delete', 'as' => 'back-admin-blog-delete']);
            //Редактирование и просмотр тегов блога
            Route::get('/blog/tags', ['uses' => 'BlogController@tags', 'as' => 'back-admin-blog-tags-index']);
            Route::post('/blog/tags/add', ['uses' => 'BlogController@tagsAdd', 'as' => 'back-admin-blog-tags-add']);
            Route::post('/blog/tags/edit/{id}', ['uses' => 'BlogController@tagsEdit', 'as' => 'back-admin-blog-tags-edit']);
            Route::post('/blog/tags/delete/{id}', ['uses' => 'BlogController@tagsDelete', 'as' => 'back-admin-blog-tags-delete']);
            //Просмотр и редактирование магазина
            Route::get('/shop', ['uses' => 'ShopController@index', 'as' => 'back-admin-shop-index']);
            Route::get('/shop/add', ['uses' => 'ShopController@getAdd', 'as' => 'back-admin-shop-add']);
            Route::post('/shop_add', ['uses' => 'ShopController@postAdd', 'as' => 'back-admin-shop_post-add']);
            Route::get('/shop/edit/{id}', ['uses' => 'ShopController@getEdit', 'as' => 'back-admin-shop-edit']);
            Route::post('/shop_edit/{id}', ['uses' => 'ShopController@postEdit', 'as' => 'back-admin-shop_post-edit']);
            Route::post('/shop/delete/{id}', ['uses' => 'ShopController@delete', 'as' => 'back-admin-shop-delete']);
            //Просмотр и редактирование категорий магазина
            Route::get('/shop_category', ['uses' => 'ShopCategoryController@index', 'as' => 'back-admin-shop_category-index']);
            Route::post('/shop_category/add', ['uses' => 'ShopCategoryController@add', 'as' => 'back-admin-shop_category-add']);
            Route::post('/shop_category/edit/{id}', ['uses' => 'ShopCategoryController@edit', 'as' => 'back-admin-shop_category-edit']);
            Route::post('/shop_category/delete/{id}', ['uses' => 'ShopCategoryController@delete', 'as' => 'back-admin-shop_category-delete']);
            //Просмотр и редактирование названия и описания к бесплатным курсам
            Route::get('/free_courses_name', ['uses' => 'FreeCoursesNameController@index', 'as' => 'back-admin-free-courses-name-index']);
            Route::post('/free_courses_name/add', ['uses' => 'FreeCoursesNameController@postAdd', 'as' => 'back-admin-free-courses-name-post-add']);
            Route::post('/free_courses_name/edit/{id}', ['uses' => 'FreeCoursesNameController@postEdit', 'as' => 'back-admin-free-courses-name-post-edit']);
            Route::post('/free_courses_name/delete/{id}', ['uses' => 'FreeCoursesNameController@delete', 'as' => 'back-admin-free-courses-name-delete']);
            Route::post('/free_courses_name/erase/{id}', ['uses' => 'FreeCoursesNameController@erase', 'as' => 'back-admin-free-courses-name-erase']);
            //Просмотр и редактирование бесплатных курсов
            Route::get('/free_courses', ['uses' => 'FreeCoursesController@index', 'as' => 'back-admin-free-courses-index']);
            Route::get('/free_courses/add', ['uses' => 'FreeCoursesController@getAdd', 'as' => 'back-admin-free-courses-get-add']);
            Route::post('/free_courses/add', ['uses' => 'FreeCoursesController@postAdd', 'as' => 'back-admin-free-courses-post-add']);
            Route::get('/free_courses/edit/{id}', ['uses' => 'FreeCoursesController@getEdit', 'as' => 'back-admin-free-courses-get-edit']);
            Route::post('/free_courses/edit/{id}', ['uses' => 'FreeCoursesController@postEdit', 'as' => 'back-admin-free-courses-post-edit']);
            Route::post('/free_courses/delete/{id}', ['uses' => 'FreeCoursesController@delete', 'as' => 'back-admin-free-courses-delete']);
            //Просмотр и редактирование платных курсов
            Route::get('/pay_courses', ['uses' => 'PayCoursesController@index', 'as' => 'back-admin-pay-courses-index']);
            Route::get('/pay_courses/add', ['uses' => 'PayCoursesController@getAdd', 'as' => 'back-admin-pay-courses-get-add']);
            Route::post('/pay_courses/add', ['uses' => 'PayCoursesController@postAdd', 'as' => 'back-admin-pay-courses-post-add']);
            Route::get('/pay_courses/edit/{id}', ['uses' => 'PayCoursesController@getEdit', 'as' => 'back-admin-pay-courses-get-edit']);
            Route::post('/pay_courses/edit/{id}', ['uses' => 'PayCoursesController@postEdit', 'as' => 'back-admin-pay-courses-post-edit']);
            Route::post('/pay_courses/delete/{id}', ['uses' => 'PayCoursesController@delete', 'as' => 'back-admin-pay-courses-delete']);
            //Просмотр и редактирование названия и описания к платных курсов
            Route::get('/pay_courses_name', ['uses' => 'PayCoursesNameController@index', 'as' => 'back-admin-pay-courses-name-index']);
            Route::post('/pay_courses_name/add', ['uses' => 'PayCoursesNameController@postAdd', 'as' => 'back-admin-pay-courses-name-post-add']);
            Route::post('/pay_courses_name/edit/{id}', ['uses' => 'PayCoursesNameController@postEdit', 'as' => 'back-admin-pay-courses-name-post-edit']);
            Route::post('/pay_courses_name/delete/{id}', ['uses' => 'PayCoursesNameController@delete', 'as' => 'back-admin-pay-courses-name-delete']);
            Route::post('/pay_courses_name/erase/{id}', ['uses' => 'PayCoursesNameController@erase', 'as' => 'back-admin-pay-courses-name-erase']);
        });
    });
});
Auth::routes();




