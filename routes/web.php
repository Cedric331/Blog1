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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/articles', 'ArticleController@index')->name('article-index');
Route::get('/articles/{slug}', 'ArticleController@show')->name('article-show');

Route::post('/commentaire', 'CommentaireController@store')->name('commentaire-store')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
