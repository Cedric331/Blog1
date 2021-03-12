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
Route::get('/articles/categorie/{title}', 'ArticleController@indexCategorie')->name('article-categorie');
Route::get('/articles/{slug}', 'ArticleController@show')->name('article-show');

Route::get('/photo', 'PhotoController@index')->name('photo-index');
Route::post('/photo', 'PhotoController@store')->name('photo-store')->middleware('image-sanitize');
Route::delete('/photo/{photo}', 'PhotoController@delete')->name('photo-delete');

Route::group(['middleware' => 'auth'], function () {
   Route::post('/commentaire', 'CommentaireController@store')->name('commentaire-store');
   Route::patch('/commentaire/edit', 'CommentaireController@edit')->name('commentaire-edit');
   Route::delete('/commentaire/delete/{id}', 'CommentaireController@delete')->name('commentaire-delete');
   
   Route::post('/like/article', 'LikeController@store')->name('like-post');
   Route::post('/dislike/article', 'LikeController@delete')->name('like-delete');

   Route::get('/account', 'AccountController@index')->name('account-index');
   Route::post('/account/update', 'AccountController@update')->name('account-update');
   Route::delete('/account/delete/{user}', 'AccountController@delete')->name('account-delete');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
