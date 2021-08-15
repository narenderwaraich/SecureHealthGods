<?php

use Illuminate\Support\Facades\Route;

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

///Session Controller
// Route::get('/login','SessionController@loginView')->name('login');
// Route::post('login','SessionController@loginId');
Route::get('/logout','SessionController@destroy')->name('logout');

Route::get('/user-profile','UserProfileController@index');
Route::post('/update-user-address','UserProfileController@changeAddress');
Route::post('/user-profile-update','UserProfileController@profileUpdate');
Route::post('/user-profile-logo-update','UserProfileController@profileLogoUpdate');
Route::post('/user/change-password','UserProfileController@changePass');

Route::get('/verifyemail/{token}','Auth\RegisterController@verify');
Route::get('/resend-verify-mail/{email}','Auth\RegisterController@resendToken');
Route::post('/verify-otp','Auth\RegisterController@verifyOTP');
Route::get('/resend-otp-code/{mobile}','Auth\RegisterController@reGenrateOTP');
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('AdminLogin');
// Route::post('admin/login', 'Auth\LoginController@login')->name('auth.login');
// Route::post('admin/logout', 'Auth\LoginController@logout')->name('auth.logout');

//// user new account
Route::get('/register-account', function () {
    return view('sign-up');
});

Route::get('/verify-account', function () {
    return view('verify');
});

Route::get('/login-account', function () {
    return view('login-account');
});

Route::post('/register-account', 'SignUpController@create');
Route::post('/verify-account', 'SignUpController@verify');

Route::get('/', 'HomeController@index');
Route::get('/admin','AdminController@homePage');

Auth::routes();

Route::prefix('admin')->group(function () {

	///change password for admin user
	Route::get('/change-password', 'AdminController@changePassGet');
	Route::post('/update/password', 'AdminController@changePass');

	Route::get('/payments','OrderPaymentController@index');
	Route::get('/payment/{status}/list','OrderPaymentController@paymentWithStatus');

	// user account 
	Route::get('/users','AdminController@index');
	Route::get('/user/{status}','AdminController@userWithStatus');
	Route::get('/user/suspend-user/{id}','AdminController@enableDisableUser');
	Route::get('/user/verified/{id}','AdminController@verifyUser');
});
Route::any('/user/search','AdminController@SearchData');

// /// Country State City
Route::get('get-state-list','APIController@getStateList');
Route::get('get-city-list','APIController@getCityList');

//Page Add

Route::get('/page/create', 'PageController@create');
Route::post('/page/create', 'PageController@store');
Route::get('/page/edit/{id}', 'PageController@edit');
Route::post('/page/update/{id}', 'PageController@update');
Route::get('/page/show', 'PageController@index');
Route::get('/page/delete/{id}', 'PageController@destroy');

///Page Setup
Route::get('/page-setup/show', 'AdminController@pageIndex');
Route::get('/page-setup/create', 'AdminController@pageCreate');
Route::post('page-setup/create', 'AdminController@pageStore');
Route::get('/page-setup/edit/{id}', 'AdminController@pageEdit');
Route::post('/page-setup/update/{id}', 'AdminController@pageUpdate');
Route::get('/page-setup/delete/{id}', 'AdminController@pageDestroy');

/// Contact Us Controller
Route::post('/contact-us','ContactController@store');
Route::get('/term-of-services','ContactController@termOfServices');
Route::get('/privacy-policy','ContactController@privacyPolicy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
