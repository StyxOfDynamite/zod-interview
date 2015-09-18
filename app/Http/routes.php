<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return redirect()->route('user.index');;
});

$app->get('user', [
    'as' => 'user.index', 'uses' => 'UserController@index'
]);
$app->get('user/create', [
    'as' => 'user.create', 'uses' => 'UserController@create'
]);
$app->post('user', [
    'as' => 'user.store', 'uses' => 'UserController@store'
]);
$app->get('user/{id}/edit', [
    'as' => 'user.edit', 'uses' => 'UserController@edit'
]);
$app->patch('user/{id}', [
    'as' => 'user.update', 'uses' => 'UserController@update'
]);
$app->get('user/{id}/delete', [
    'as' => 'user.delete', 'uses' => 'UserController@delete'
]);
$app->delete('user/{id}', [
    'as' => 'user.destroy', 'uses' => 'UserController@destroy'
]);
$app->get('user/{id}', [
    'as' => 'user.candidate', 'uses' => 'UserController@display'
]);