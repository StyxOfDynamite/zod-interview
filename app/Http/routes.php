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
    return redirect()->route('candidate.index');;
});

$app->get('candidate', [
    'as' => 'candidate.index', 'uses' => 'CandidateController@index'
]);
$app->get('candidate/create', [
    'as' => 'candidate.create', 'uses' => 'CandidateController@create'
]);
$app->post('candidate', [
    'as' => 'candidate.store', 'uses' => 'CandidateController@store'
]);
$app->get('candidate/{id}/edit', [
    'as' => 'candidate.edit', 'uses' => 'CandidateController@edit'
]);
$app->patch('candidate/{id}', [
    'as' => 'candidate.update', 'uses' => 'CandidateController@update'
]);
$app->get('candidate/{id}/delete', [
    'as' => 'candidate.delete', 'uses' => 'CandidateController@delete'
]);
$app->delete('candidate/{id}', [
    'as' => 'candidate.destroy', 'uses' => 'CandidateController@destroy'
]);
$app->get('candidate/{id}', [
    'as' => 'candidate.candidate', 'uses' => 'CandidateController@display'
]);
$app->get('file/{id}', [
    'as' => 'file.download', 'uses' => 'FileController@getCandidateFile'
]);