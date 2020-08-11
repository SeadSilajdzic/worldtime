<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@single_post',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'categories.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tags.single'
]);

Route::resource('/', 'FrontEndController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/posts/trash/{id}', [
        'uses' => 'PostsController@trash',
        'as' => 'posts.trash'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed.posts'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);


   Route::resource('/posts', 'PostsController');
   Route::resource('/categories', 'CategoriesController');
   Route::resource('/tags', 'TagsController');

   Route::get('/users/remove-admin/{id}', [
       'uses' => 'UsersController@removeAdmin',
       'as' => 'users.remove.admin'
   ]);

    Route::get('/users/make-admin/{id}', [
        'uses' => 'UsersController@makeAdmin',
        'as' => 'users.make.admin'
    ]);

   Route::resource('/users', 'UsersController');
});
