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

/*Route::get('/', function () {
    return view('site.index');
});*/
Route::get('/', 'SiteController@index');
Route::get('/baixe-o-e-book', 'SiteController@downloadEbook')->name('download-e-book');
Route::post('/download-e-book-save', 'SiteController@downloadEbookPost')->name('download-e-book-save');
Route::get('/download-e-book-sucesso/{email}', 'SiteController@downloadEbookSuccess')->name('download-e-book-success');
Route::get('/download-e-book-pdf', 'SiteController@downloadEbookPdf')->name('download-e-book-pdf');
Route::get('/baixe-o-e-book-qrcode', 'SiteController@downloadEbook')->name('download-e-book-qrcode');
Route::get('/eixo-ferroviario-vallourec', 'SiteController@emarketing')->name('eixo-ferroviario-vallourec');



Auth::routes();
Route::get('register', function () {
    return redirect('/');
});

Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
//games
Route::middleware('auth')->get('game-create', 'GameController@createGame');
Route::middleware('auth')->post('game-store', 'GameController@storeGame');
Route::middleware('auth')->get('game-show/{id}', 'GameController@showGame');
Route::middleware('auth')->post('game-update', 'GameController@updateGame');
Route::middleware('auth')->get('game-destroy/{id}', 'GameController@destroyGame');

//round
Route::middleware('auth')->post('round-store', 'RoundController@storeRound');
Route::middleware('auth')->get('round-destroy/{id}', 'RoundController@destroyRound');
Route::middleware('auth')->post('round-update', 'RoundController@updateRound');



Route::post('consultar-cupons', '\App\Http\Controllers\CupomController@consult')->name('cupons.consult');
Route::get('numeros-da-sorte', '\App\Http\Controllers\CupomController@numbers')->name('numbers');
Route::get('cartapremiado/{slug}', '\App\Http\Controllers\CupomController@cartapremiado')->name('cartapremiado');

Route::get('/regulamento', function () {
    return view('site.regulamento');
})->name('regulation');
Route::get('/cooperativas-participantes', function () {
    return view('site.cooperativas-participantes');
})->name('cooperatives');

Route::post('enviar-contato', 'HomeController@submitform')->name('submitform');