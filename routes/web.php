<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/index', 'HomeController@show');


//Credentials Route
Route::get('show_credentials', 'AddCredentialsController@show');
Route::get('delete_credentials/{id}', 'AddCredentialsController@destroy');
Route::get('add_credentials', 'AddCredentialsController@create');
Route::post('credentials_submit', 'AddCredentialsController@store');
Route::get('edit_credentials/{id}', 'AddCredentialsController@edit');
Route::post('update_credentials/{id}' , 'AddCredentialsController@update')->name('cred.update');

//Documents Route
Route::get('show_documents', 'DocumentsController@show');
Route::get('delete_documents/{id}', 'DocumentsController@destroy');
Route::get('add_documents', 'DocumentsController@create');
Route::post('add_documents', 'DocumentsController@store')->name('uploadFile');
Route::get('edit_documents/{id}', 'DocumentsController@edit');
Route::post('update_documents/{id}' , 'DocumentsController@update')->name('doc.update');
//Route::get('download_file', 'DocumentsController@downloadFile')->name('downloadFile');

//Zip folder Route
Route::get('add_zip_documents', 'ZipDocumentsController@create');
//Route::get('add_zip_documents', 'ZipDocumentsController@show');
//Route::get('add_zip_documents', 'ZipDocumentsController@index')->name('create-zip');

//Payment Card Route
Route::get('show_cards', 'PaymentcardController@show');
Route::get('delete_cards/{id}', 'PaymentcardController@destroy');
Route::get('add_cards', 'PaymentcardController@create');
Route::post('cards_submit', 'PaymentcardController@store');
Route::get('edit_cards/{id}', 'PaymentcardController@edit');
Route::post('update_cards/{id}' , 'PaymentcardController@update')->name('card.update');

//User Profile Routes
//Route::get('profile', 'UserProfileController@show');
Route::get('user_profile/{id}', 'UserProfileController@userprofile')->name('user_profile');
Route::put('user-profile/{id}', 'UserProfileController@update')->name('profile');
//Route::get('user_profile', 'UserProfileController@create');
//Route::post('profile_submit', 'UserProfileController@store');





