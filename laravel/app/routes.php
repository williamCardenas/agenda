<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',  'AgendaController@Index');

Route::get('/novoEvento',  function()
{
	return View::make('cadastroEvento');
});

Route::model('agenda', 'Agenda');

Route::post('/novoEvento', 'AgendaController@NovoEvento');

Route::get('/editarEvento/{agenda}', 'AgendaController@EditarEvento');

Route::post('/editarEvento/{agenda}', 'AgendaController@EditarEvento');

Route::get('/deletarEvento/{agenda}','AgendaController@DeletarEvento');

Route::post('/deletarEvento/{agenda}','AgendaController@DeletarEvento');