<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/refer-link/{email}','UserProfileControler@refLink');
Route::get('/register/{refer}','UserProfileControler@register');

// page controller
Route::get('/php', 'PageController@phpPage');
Route::get('/test-php', 'PageController@phpTestPage');
Route::get('/laravel', 'PageController@laravelPage');
Route::get('/test-laravel', 'PageController@laravelTestPage');
Route::get('/wordpress', 'PageController@wordpressPage');
Route::get('/test-wordpress', 'PageController@wordpressTestPage');
Route::get('/gk', 'PageController@gkPage');
Route::get('/aws', 'PageController@awsPage');
Route::get('/test-gk', 'PageController@gkTestPage');
Route::get('/test-aws', 'PageController@awsTestPage');
Route::get('/practice-exams/{category}', 'PageController@awsExamTestPage');
Route::get('/post', 'PageController@postPage');
Route::get('/about-us', 'PageController@aboutPage');
Route::get('/privacy-policy', 'PageController@privacyPolicy');

//get test question answer
Route::post('/test-php','PageController@phpTest');
Route::post('/test-laravel','PageController@laravelTest');
Route::post('/test-wordpress','PageController@wordpressTest');
Route::post('/test-gk','PageController@gkTest');
Route::post('/test-aws','PageController@awsTest');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/question/add', 'QuestionController@create');
Route::post('/admin/question/add', 'QuestionController@store');
Route::get('/admin/question/edit/{id}', 'QuestionController@edit');
Route::post('/admin/question/update/{id}', 'QuestionController@update');
Route::get('/admin/question/show', 'QuestionController@pageList');
Route::get('/admin/question/show/Php', 'QuestionController@phpPage');
Route::get('/admin/question/show/Laravel', 'QuestionController@laravelPage');
Route::get('/admin/question/show/Wordpress', 'QuestionController@wordpressPage');
Route::get('/admin/question/show/GK', 'QuestionController@gkPage');
Route::get('/admin/question/delete/{id}', 'QuestionController@destroy');

Route::get('/admin/category/add', 'CategoryController@create');
Route::post('/admin/category/add', 'CategoryController@store');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit');
Route::post('/admin/category/update/{id}', 'CategoryController@update');
Route::get('/admin/category/show', 'CategoryController@index');
Route::get('/admin/category/delete/{id}', 'CategoryController@destroy');

Route::get('/admin/banner/add', 'BanerSlideController@create');
Route::post('/admin/banner/add', 'BanerSlideController@store');
Route::get('/admin/banner/edit/{id}', 'BanerSlideController@edit');
Route::post('/admin/banner/update/{id}', 'BanerSlideController@update');
Route::get('/admin/banner/show', 'BanerSlideController@index');
Route::get('/admin/banner/delete/{id}', 'BanerSlideController@destroy');

/// Contact us controller
Route::post('contact-us','ContactController@contactUs');
Route::get('/contact-us','ContactController@get');
Route::post('contactUs','ContactController@store');
Route::get('/admin/contact-us','ContactController@getContact');
Route::get('/contact/reply/{id}','ContactController@contactReplyGet');
Route::post('contact-reply','ContactController@contactReply');


//// send manumal mail
Route::get('/send-mail','ContactController@sendMailView');
Route::post('send-mail','ContactController@sendMail');


Route::get('/admin/test/question/add', 'TestQuestionController@create');
Route::post('/admin/test/question/add', 'TestQuestionController@store');
Route::get('/admin/test/question/edit/{id}', 'TestQuestionController@edit');
Route::post('/admin/test/question/update/{id}', 'TestQuestionController@update');
Route::get('/admin/test/question/show', 'TestQuestionController@pageList');
Route::get('/admin/test/question/show/{category}', 'TestQuestionController@examListPage');
Route::get('/admin/test/question/delete/{id}', 'TestQuestionController@destroy');

Route::get('/admin/page/add', 'AdminController@pageCreate');
Route::post('/admin/page/add', 'AdminController@pageStore');
Route::get('/admin/page/edit/{id}', 'AdminController@pageEdit');
Route::post('/admin/page/update/{id}', 'AdminController@pageUpdate');
Route::get('/admin/page/show', 'AdminController@pageIndex');
Route::get('/admin/page/delete/{id}', 'AdminController@pageDestroy');
Route::get('/admin/user/list', 'AdminController@userList');
Route::get('/admin/user/delete/{id}','AdminController@userDestroy');
Route::get('/user/verified/{id}','AdminController@verifyUser');

/// Country State City
Route::get('get-state-list','APIController@getStateList');
Route::get('get-city-list','APIController@getCityList');

Auth::routes();
Route::get('/dashboard','SubscriberController@index');

//Register Controller
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

///Session Controller
Route::get('/login','SessionController@loginView')->name('login');
Route::post('login','SessionController@loginId');
Route::post('request/verifyemail','SessionController@resendVerifyMail');



//User Profile Controller
Route::get('/user-profile','UserProfileControler@viewProfile');
Route::post('user-profile-update/{id}','UserProfileControler@updateProfile');
Route::get('/account-setting','UserProfileControler@accountSetting');
Route::get('/change-password','UserProfileControler@getChangePass');
Route::post('change-password','UserProfileControler@updatePass');
Route::post('add-user-address/{id}','UserProfileControler@storeAddress');
Route::get('/update-user-address','UserProfileControler@getUpdateAddress');
Route::post('update-user-address/{id}','UserProfileControler@updateAddress');

Route::post('/add-bank/{id}','SubscriberController@storeBank');

Route::get('/get-youtube-subscribers','YoutubeGetController@create');
Route::post('get-youtube-subscribers','YoutubeGetController@store');
Route::get('/edit-youtube-subscribers','YoutubeGetController@edit');
Route::post('edit-youtube-subscribers/{id}','YoutubeGetController@update');
Route::get('/list-youtube-subscribers','YoutubeGetController@index');
Route::get('/remove-youtube-subscribers/{id}','YoutubeGetController@destroy');
Route::get('/admin/subscriber-plan/activate/{id}','YoutubeGetController@activate');
Route::get('/admin/subscriber-plan/deactivate/{id}','YoutubeGetController@deactivate');

Route::get('/admin/subscriber-plan/list','SubscriberPlanController@index');
Route::get('/admin/subscriber-plan/add','SubscriberPlanController@create');
Route::post('admin/subscriber-plan/add','SubscriberPlanController@store');
Route::get('/admin/subscriber-plan/edit/{id}','SubscriberPlanController@edit');
Route::post('admin/subscriber-plan/update/{id}','SubscriberPlanController@update');
Route::get('/admin/subscriber-plan/delete/{id}','SubscriberPlanController@destroy');


Route::get('/videos', 'YoutubeController@index');
Route::get('/video/get', 'YoutubeController@getData');
Route::get('/video/create', 'YoutubeController@create');
Route::post('video/create', 'YoutubeController@store');
Route::get('/video/edit/{id}', 'YoutubeController@edit');
Route::post('/video/update/{id}', 'YoutubeController@update');
Route::get('/video/delete/{id}', 'YoutubeController@destroy');
Route::get('/tuttorials', 'YoutubeController@showAll');

Route::get('/approvel-list', 'SubscribeApprovelController@index');
Route::get('/aprovel/channel/{id}', 'SubscribeApprovelController@create');
Route::post('aprovel/channel/{id}', 'SubscribeApprovelController@store');
Route::get('/admin/subscribe/approve/{channelId}/{id}', 'SubscribeApprovelController@approve');

// Pay Payments 
Route::get('/pay/payment/list', 'PaymentsController@showPayment');
Route::post('pay/payment', 'PaymentsController@paytmPay');
Route::get('/paytm-callback', 'PaymentsController@paytmCallback');


// Pay Payments Direct
Route::get('/pay/payment/list', 'DirectPaymentController@showPayment');
Route::get('/pay/{status}/payment', 'DirectPaymentController@showPaymentStatus');
Route::get('/pay/payment/field/list', 'DirectPaymentController@fieldPayment');
Route::get('/pay/payment', 'DirectPaymentController@create');
Route::post('pay/payment', 'DirectPaymentController@paytmPay');
Route::get('/direct-payment-call-back', 'DirectPaymentController@paytmCallback');