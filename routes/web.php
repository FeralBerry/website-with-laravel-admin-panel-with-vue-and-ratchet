<?php

use Illuminate\Support\Facades\Route;

Route::group([], function() {
    $front = [
        'namespace' => 'App\Http\Controllers\Front',
    ];
    Route::group($front, function () {
        Route::get('/',['uses' => 'IndexController@index','as' => 'front-index']);
        Route::get('/contact',['uses' => 'IndexController@contact','as' => 'front-contact']);
        Route::get('/shop',['uses' => 'IndexController@shop','as' => 'front-shop']);
        Route::get('/shop/product/{id}',['uses' => 'IndexController@shopProduct','as' => 'front-shop-product']);
        Route::get('/blog',['uses' => 'IndexController@blog','as' => 'front-blog']);
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
            Route::get('/free/courses', ['uses' => 'FreeCoursesController@index', 'as' => 'back-free-courses-index']);
            Route::get('/free/course/{id}', ['uses' => 'FreeCoursesController@singleCourse', 'as' => 'back-free-course-index']);
        });
    });
});
Auth::routes();




