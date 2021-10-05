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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', 'frontend\CarController@index');
Route::get('/welcome', 'frontend\CarController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit/{id}',        	array('as'=>'home/edit','uses'=>'HomeController@edit'));
Route::patch('/home/{id}',      array('as'=>'home/update','uses'=>'HomeController@update'));
Route::get('frontend/car/edit/{id}',        	array('as'=>'frontend/car/edit','uses'=>'frontend\CarController@edit'));
Route::get('cars', 'frontend\CarController@cars');

Route::get('about', function () {
    return view('frontend.about');
});
Route::get('service', function () {
    return view('frontend.service');
});
Route::get('contact', function () {
    return view('frontend.contact');
});


Route::get('/feedback/create',        	array('as'=>'frontend/feedback/create','uses'=>'frontend\feedbackController@create'));
Route::post('/feedback/store',        	array('as'=>'frontend/feedback/store','uses'=>'frontend\feedbackController@store'));
Route::get('feedback/edit/{id}',        	array('as'=>'frontend/feedback/edit','uses'=>'frontend\feedbackController@edit'));

Route::get('/registration',        			array('as'=>'registration','uses'=>'frontend\RegistrationController@index'));
Route::get('/registration/create',        	array('as'=>'frontend/registration/create','uses'=>'frontend\RegistrationController@create'));
Route::post('/registration/store',        	array('as'=>'frontend/registration/store','uses'=>'frontend\RegistrationController@store'));
Route::get('/registration/edit/{id}',        	array('as'=>'frontend/registration/edit','uses'=>'frontend\RegistrationController@edit'));
Route::get('/registration/show/{id}',        	array('as'=>'frontend/registration/show','uses'=>'frontend\RegistrationController@show'));
Route::post('/registration/update/{id}',      array('as'=>'frontend/registration/update','uses'=>'frontend\RegistrationController@update'));
Route::get('/registration/delete/{id}', 		array('as'=>'frontend/registration/delete','uses'=>'frontend\RegistrationController@destroy'));

Route::any('/search',        			array('as'=>'search','uses'=>'frontend\SearchController@index'));

Route::group(['prefix' => 'backend','middleware' => ['auth']], function (){  

    Route::get('dashboard',        			array('as'=>'dashboard','uses'=>'backend\DashboardController@index'));
    Route::get('log',        			array('as'=>'log','uses'=>'backend\LogController@index'));
    Route::resource('car', 'backend\CarController');
    Route::resource('cartype', 'backend\CartypeController');
    Route::resource('brand', 'backend\BrandController');
    Route::resource('role', 'backend\roleController');
    Route::resource('registration', 'backend\RegistrationController');
    Route::get('/registration/{id}/show',        	array('as'=>'backend/registration/show','uses'=>'backend\RegistrationController@show'));
    Route::resource('user', 'backend\UserController');
    Route::resource('payment', 'backend\PaymentController');
    
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit/{id}',        	array('as'=>'home/edit','uses'=>'HomeController@edit'));
Route::patch('/registration/change/{id}',        	array('as'=>'backend/registration/change','uses'=>'backend\RegistrationController@change'));
Route::patch('/home/{id}',      array('as'=>'home/update','uses'=>'HomeController@update'));

Route::resource('feedback', 'backend\feedbackController');
// Route::get('/registration',        			array('as'=>'registration','uses'=>'backend\RegistrationController@index'));
// Route::get('/registration/create/{id}',        	array('as'=>'/registration/create','uses'=>'backend\RegistrationController@create'));
// Route::post('/registration/store',        	array('as'=>'/registration/store','uses'=>'backend\RegistrationController@store'));
// Route::get('/registration/edit/{id}',        	array('as'=>'/registration/edit','uses'=>'backend\RegistrationController@edit'));
// Route::post('/registration/update/{id}',      array('as'=>'/registration/update','uses'=>'backend\RegistrationController@update'));
// Route::get('/registration/delete/{id}', 		array('as'=>'/registration/delete','uses'=>'backend\RegistrationController@destroy'));
Route::get('report',        			array('as'=>'report','uses'=>'backend\ReportController@index'));
Route::get('report/search/{type?}',        	array('as'=>'report/search/{type?}','uses'=>'backend\ReportController@search'));
Route::get('report/exportexcel/{type?}',        	array('as'=>'report/exportexcel/{type?}','uses'=>'backend\ReportController@excel'));
Route::get('report/previewpdf/{type?}',        	array('as'=>'report/previewpdf/{type?}','uses'=>'backend\ReportController@pdfPreview'));
Route::get('report/exportpdf/{type?}',        	array('as'=>'report/exportpdf/{type?}','uses'=>'backend\ReportController@pdfExport'));

});