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

Route::post('/commentaire', 'CommentaireController@store')->name('commentaire-store')->middleware('auth');
Route::patch('/commentaire/edit', 'CommentaireController@edit')->name('commentaire-edit')->middleware('auth');
Route::delete('/commentaire/delete/{id}', 'CommentaireController@delete')->name('commentaire-delete')->middleware('auth');

Route::post('/like/article', 'LikeController@store')->name('like-post')->middleware('auth');
Route::post('/dislike/article', 'LikeController@delete')->name('like-delete')->middleware('auth');

Route::get('/photo', 'PhotoController@index')->name('photo-index');
Route::post('/photo/store', 'PhotoController@store')->name('photo-store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
