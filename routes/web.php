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

Route::get('/',[
    'uses'=>'TodoListController@index',
    'as'=>'get.todoList'
]);

Route::post('/add/issue',[
    'uses'=>'TodoListController@create',
    'as'=>'add.issue'
]);

Route::post('/update/issue',[
    'uses'=>'TodoListController@update',
    'as'=>'post.update.issue'
]);

Route::get('/delete/{id}/issue',[
    'uses'=>'TodoListController@delete',
    'as'=>'get.delete.issue'
]);

Route::get('/{id}/{done}/issue',[
    'uses'=>'TodoListController@done',
    'as'=>'get.done.not.issue'
]);