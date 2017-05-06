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



Route::get('article/register','BlogController@getregister');

Route::post('register','BlogController@postregister');

Route::get('/home','UserController@home');

Route::get('/', function () {
    return view('Blog.BlogTest', ['post_name' => 'a normal post']);
});

Route::get('/start',function (){
    return view('Blog.start');
});

Route::get('/article/formyself','BlogController@myself');

Route::get('/article/look/{uid}','BlogController@look');

Route::get('/article/change/{uid}','BlogController@change');

Route::post('/article/changeinsert/{uid}','BlogController@changeinsert');

Route::get('/article/changepass/{id}','BlogController@changepass');

Route::post('/article/changepassinsert/{id}','BlogController@changepassinsert');

Route::get('/article/delete/{uid}','BlogController@delete');


Route::get('/article/Havealook','BlogController@Havealook');

Route::get('/article/Admin','BlogController@Admin');

Route::get('/article/user_admin','BlogController@user_admin');

Route::get('/article/adminlook/{id}','BlogController@adminlook');

Route::get('/article/admindelete/{id}','BlogController@admindelete');

//post module

Route::post('/article/comment/{blog_id}','BlogController@comment');
//show add post page
Route::get('/article', function(){
   return view('Blog.Add');
});
//add a post
Route::post('/article', 'BlogController@add');

//update a post

Route::put('/article/{id}', 'BlogController@update');

Route::get('/article/update/{id}', function($id){
   return view('Blog.update', ['id' => $id]);
});
Route::get('/article/delete/{id}','BlogController@delete');

Route::get('/article/deletepost/{id}','BlogController@deletepost');

//get a post
Route::get('/article/{id}', ['uses'=> 'BlogController@get', 'as'=> 'getPost']);
Auth::routes();


Route::post('/linklist/do_construct','linklistcontroller@do_construct');

Route::get('/linklist/construct','linklistcontroller@construct');

Route::get('/linklist/insertview','linklistcontroller@insertview');

Route::post('/linklist/insert','linklistcontroller@insert');

Route::get('/linklist/size','linklistcontroller@size');

Route::get('/linklist/pop','linklistcontroller@pop');

Route::get('/linklist/print_list','linklistcontroller@print_list');

Route::get('/linklist/deleteview','linklistcontroller@deleteview');

Route::post('/linklist/delete','linklistcontroller@delete');
//初始页面
Route::get('/linklist/welcome','linklistcontroller@welcome');





