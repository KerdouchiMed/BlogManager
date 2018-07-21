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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

  Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
  ]);

  //Post Routes
  Route::get('/post',[
    'uses' => 'PostController@index',
    'as' => 'post'
  ]);

  Route::get('/post/create',[
      'uses' => 'PostController@create',
      'as'  =>  'post.create'
  ]);

  Route::post('/post/store',[
    'uses' => 'PostController@store',
    'as'  => 'post.store'
  ]);

  //show edite post form
  Route::get('/post/edit/{id}',[
    'uses' => 'PostController@edit',
    'as'  => 'post.edit'
  ]);

  //update post
  Route::post('/post/update/{id}',
  [
    'uses' => 'PostController@update',
    'as'  => 'post.update'
  ]);

  //Trashed post
  Route::get('/post/trashed',[
    'uses' => 'PostController@trashed',
    'as' => 'post.trashed'
  ]);

  //Trash post
  Route::get('/post/trash/{id}',[
    'uses' => 'PostController@trash',
    'as' => 'post.trash'
  ]);

  //delete post
  Route::get('/post/delete/{id}',[
    'uses' => 'PostController@destroy',
    'as' => 'post.delete'
  ]);

  //restore trashed posts
  Route::get('/post/restore/{id}',[
    'uses' => 'PostController@restore',
    'as'  => 'post.restore'
  ]);


  //Category Routes
  Route::get('/category',[
    'uses' => 'CategoryController@index',
    'as' => 'category'
  ]);

  Route::get('/category/create',[
    'uses' => 'CategoryController@create',
    'as' => 'category.create'
  ]);

  Route::Post('/category/store',[
    'uses' => 'CategoryController@store',
    'as' => 'category.store'
  ]);

  //show edite category form
  Route::get('/category/edit/{id}',[
    'uses' => 'CategoryController@edit',
    'as'  => 'category.edit'
  ]);

  //update category
  Route::post('/category/update/{id}',
  [
    'uses' => 'CategoryController@update',
    'as'  => 'category.update'
  ]);

  //delete category
  Route::get('/category/delete/{id}',[
    'uses' => 'CategoryController@destroy',
    'as' => 'category.delete'
  ]);




//TAG

  Route::get('/tag',[
    'uses' => 'TagController@index',
    'as' => 'tag'
  ]);

  Route::get('/tag/create',[
    'uses' => 'TagController@create',
    'as' => 'tag.create'
  ]);

  Route::Post('/tag/store',[
    'uses' => 'TagController@store',
    'as' => 'tag.store'
  ]);

  //delete Tag
  Route::get('/tag/delete/{id}',[
    'uses' => 'TagController@destroy',
    'as' => 'tag.delete'
  ]);

  Route::get('user/',[
    'uses' => 'UserController@index',
    'as' => 'user'
  ]);

});
