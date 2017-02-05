<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// PERSONS
Route::controller('person.data', 'PersonsController', ['getRows'=>'person.data']);
Route::get('person',['as'=>'persons.index','uses'=>'PersonsController@index']);
Route::get('person/create',['as'=>'persons.create','uses'=>'PersonsController@create']);
Route::post('person/create',['as'=>'persons.store','uses'=>'PersonsController@store']);
Route::get('person/{id}',['as'=>'persons.show','uses'=>'PersonsController@show']);
Route::get('person/{id}/edit',['as'=>'persons.edit','uses'=>'PersonsController@edit']);
Route::patch('person/{id}',['as'=>'persons.update','uses'=>'PersonsController@update']);
Route::delete('person/{id}',['as'=>'persons.destroy','uses'=>'PersonsController@destroy']);
Route::get('person/autocomplete/q', array('uses'=>'PersonsController@autocomplete'));
Route::get('person/export/q',['as'=>'persons.export','uses'=>'PersonsController@export']);
Route::get('person/{id}/options',['as'=>'persons.options','uses'=>'PersonsController@options']);

//REPORTS
Route::get('/reportes/{mes}', array('uses'=>'ReportesController@index'));
Route::get('/exportar', array('uses'=>'ExportController@index'));
Route::get('/export', array('uses'=>'ExportController@export'));