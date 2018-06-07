<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/**
 * -----------------------------------------
 * use login, resgiter, reset password User
 * ----------------------------------------
 */
Route::group(['middleware' => 'user_guest'], function () {
    //login and register
    Route::get('user/login', 'Auth\Users\LoginController@showLoginForm')->name('user.login.form');
    Route::post('user/login', 'Auth\Users\LoginController@login')->name('user.login');
    //reset password to email
    Route::get('user/password/reset', 'Auth\Users\ForgotPasswordController@showLinkRequestForm');
    Route::post('user/password/email', 'Auth\Users\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('user/password/reset/{token}', 'Auth\Users\ResetPasswordController@showResetForm');
    Route::post('user/password/reset', 'Auth\Users\ResetPasswordController@reset')->name('user.password.reset');
});

/**
 * -----------------------------------------
 * use index, logout User
 * ----------------------------------------
 */

Route::group(['namespace' => 'Frontend',], function () {
    Route::get('/', 'HomeController@listCourse')->name('home.index');
    Route::get('/register', 'MemberLoginsController@form')->name('register.form');
    Route::get('/active/{token}', 'MemberLoginsController@active');
    Route::get('/login', 'MemberLoginsController@login_form')->name('member.login.form');
    Route::post('/login', 'MemberLoginsController@login');
    Route::post('/logout', 'MemberLoginsController@logout')->name('login.logout');
//    Route::get('/register/{id}', 'MemberLoginsController@form')->name('register.edit');
    Route::post('/register/confirm', 'MemberLoginsController@confirm')->name('register.confirm');
    Route::get('/register/complete', 'MemberLoginsController@complete')->name('register.complete');
    Route::get('/course', 'CoursesController@listCourse')->name('home.course');
    Route::get('/course/detail/{id}', 'CoursesController@detail_of_course')->name('home.detail_course');
    Route::group(['middleware' => 'member_auth'], function () {
        Route::get('/course/detail/message_course/{id}', 'CoursesController@form_message')->name('comment.form');
        Route::post('/course/save_message', 'CoursesController@save_message')->name('comment.confirm');
        Route::get('/course/detail/book/{id}', 'CoursesController@book')->name('booking.form');
        Route::post('/course/save_book_course', 'CoursesController@save_book')->name('booking.confirm');
        Route::get('/course/cancel_course/{id}', 'CoursesController@cancel_course')->name('cancel');
        Route::get('/book/bill/{id}', 'CoursesController@bill')->name('booking.bill');
    });
    Route::get('/verify', 'CoursesController@form_verify');
    Route::post('/verify', 'CoursesController@verify')->name('verify');
    Route::get('/introduce', 'IntroduceController@index')->name('home.introduce');
    Route::get('/teacher', 'TeachersController@listTeachers')->name('home.teacher');
    Route::get('/teacher/detail/{id}', 'TeachersController@detail_of_teacher')->name('home.detail_teacher');

});

Route::post('user/logout', 'Auth\Users\LoginController@logout')->name('login.logout');

Route::group(['middleware' => 'user_auth'], function () {
   Route::group(['prefix' => 'admin'], function () {
//categories
       Route::get('categories', 'CategoriesController@index')->name('categories.index');
       Route::get('categories/form', 'CategoriesController@form')->name('categories.form');
       Route::get('categories/form/{id}', 'CategoriesController@form')->name('categories.edit');
       Route::post('categories/confirm', 'CategoriesController@confirm')->name('categories.confirm');
       Route::get('categories/complete', 'CategoriesController@complete')->name('categories.complete');
       Route::post('categories/delete', 'CategoriesController@delete')->name('categories.delete');
       Route::post('categories/setting', 'CategoriesController@setting')->name('categories.setting');


//bookings
       Route::get('bookings', 'BookingsController@index')->name('bookings.index');
       Route::get('bookings/form', 'BookingsController@form')->name('bookings.form');
       Route::get('bookings/form/{id}', 'BookingsController@form')->name('bookings.edit');
       Route::post('bookings/confirm', 'BookingsController@confirm')->name('bookings.confirm');
       Route::get('bookings/complete', 'BookingsController@complete')->name('bookings.complete');
       Route::post('bookings/delete', 'BookingsController@delete')->name('bookings.delete');
       Route::post('bookings/setting', 'BookingsController@setting')->name('bookings.setting');
//courses
       Route::get('courses', 'CoursesController@index')->name('courses.index');
       Route::get('courses/form', 'CoursesController@form')->name('courses.form');
       Route::get('courses/form/{id}', 'CoursesController@form')->name('courses.edit');
       Route::post('courses/confirm', 'CoursesController@confirm')->name('courses.confirm');
       Route::get('courses/complete', 'CoursesController@complete')->name('courses.complete');
       Route::post('courses/delete', 'CoursesController@delete')->name('courses.delete');
       Route::post('courses/setting', 'CoursesController@setting')->name('courses.setting');
//teachers
       Route::get('teachers', 'TeachersController@index')->name('teachers.index');
       Route::get('teachers/form', 'TeachersController@form')->name('teachers.form');
       Route::get('teachers/form/{id}', 'TeachersController@form')->name('teachers.edit');
       Route::post('teachers/confirm', 'TeachersController@confirm')->name('teachers.confirm');
       Route::get('teachers/complete', 'TeachersController@complete')->name('teachers.complete');
       Route::post('teachers/delete', 'TeachersController@delete')->name('teachers.delete');
       Route::post('teachers/setting', 'TeachersController@setting')->name('teachers.setting');
//members
       Route::get('members', 'MembersController@index')->name('members.index');
       Route::get('members/form', 'MembersController@form')->name('members.form');
       Route::get('members/form/{id}', 'MembersController@form')->name('members.edit');
       Route::post('members/confirm', 'MembersController@confirm')->name('members.confirm');
       Route::get('members/complete', 'MembersController@complete')->name('members.complete');
       Route::post('members/delete', 'MembersController@delete')->name('members.delete');
       Route::post('members/setting', 'MembersController@setting')->name('members.setting');
//lessons
       Route::get('lessons', 'LessonsController@index')->name('lessons.index');
       Route::get('lessons/form', 'LessonsController@form')->name('lessons.form');
       Route::get('lessons/form/{id}', 'LessonsController@form')->name('lessons.edit');
       Route::post('lessons/confirm', 'LessonsController@confirm')->name('lessons.confirm');
       Route::get('lessons/complete', 'LessonsController@complete')->name('lessons.complete');
       Route::post('lessons/delete', 'LessonsController@delete')->name('lessons.delete');
       Route::post('lessons/setting', 'LessonsController@setting')->name('lessons.setting');
//videos
       Route::get('videos', 'VideosController@index')->name('videos.index');
       Route::get('videos/form', 'VideosController@form')->name('videos.form');
       Route::get('videos/form/{id}', 'VideosController@form')->name('videos.edit');
       Route::post('videos/confirm', 'VideosController@confirm')->name('videos.confirm');
       Route::get('videos/complete', 'VideosController@complete')->name('videos.complete');
       Route::post('videos/delete', 'VideosController@delete')->name('videos.delete');
       Route::post('videos/setting', 'VideosController@setting')->name('videos.setting');
       //profile
       Route::get('profile', 'ProfileController@index')->name('profile.index');
       Route::get('profile/edit', 'ProfileController@form')->name('profile.edit');
       Route::post('profile/confirm', 'ProfileController@confirm')->name('profile.confirm');
       Route::get('profile/complete', 'ProfileController@complete')->name('profile.complete');
   });
});

Route::get('/paywithpaypal', 'PaymentController@view');
Route::post('/paypal', 'PaymentController@payWithpaypal');
Route::post('/status', 'PaymentController@getPaymentStatus');
//array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
//Route::get('/paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
