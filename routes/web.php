<?php

use App\Mail\ContactForm;

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

Route::get('/', 'FrontendController@home')->name('homepage');
Route::get('/gallery/{slug}', 'FrontendController@gallery')->name('gallery');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', 'FrontendController@contactForm');
Route::get('/service', 'FrontendController@service')->name('service');

Route::get('/mail', function(){
    
    $data = [
        "fname" => "Tawhidul Islam",
        "lname" => "Khan",
        "email" => "tawhid@gmail.com",
        "subject" => "Contact",
        "message" => "Hello Tawhid",
    ];
    return new ContactForm($data);
});

/* 
| ==========================
|  Authenticate Routes
| ==========================
*/


Route::get('/register','AuthController@resgisterShow')->name('registerr');
Route::post('/register','AuthController@resgisterStore');
Route::get('/login','AuthController@loginShow')->name('login');
Route::post('/login','AuthController@loginStore');
Route::post('/logout','AuthController@logout')->name('logout');
Route::get('/verify/{token}','AuthController@verify')->name('verify');
Route::get('/verify-again','AuthController@verifyAgain')->name('verifyAgain');
Route::post('/verify-again','AuthController@resendVerification');

/* 
| ==========================
|  Password Reset Routes
| ==========================
*/

Route::get('/password/reset','AuthController@passwordResetToken')->name('passwordResetToken');
Route::post('/password/reset','AuthController@passwordResetTokenSend');

Route::get('/password/reset/update/{token?}','AuthController@passwordReset')->name('passwordReset');
Route::post('/password/reset/update','AuthController@passwordResetUpdate');




Route::group(['prefix'=>'/admin'],function(){

    Route::resource('/album','AlbumController');
    Route::resource('/photo','PhotoController');
    Route::resource('/team','TeamController');
    Route::resource('/settings','SettingController');
    Route::resource('/service','ServiceController');
    Route::resource('/contactinfo','ContactInfoController');
    Route::resource('/permission','PermissionController');
    Route::resource('/role','RoleController');

    /*=================
      | User Settings 
    ====================*/

    Route::resource('/user','UserController');
    Route::get('/profile','UserController@profile')->name('user.profile');
    Route::put('/profile','UserController@profile_update')->name('user.update');

});

Route::get('/{token}/{id}', 'UserController@newUserPassSet')->name('new.user');

Route::get('/admin', 'HomeController@index')->name('dashboard');



// Route::group(['prefix'=>'/category'],function(){

//     Route::get('/{slug}','CategoryController@catshow')->name('catshow');

// });
