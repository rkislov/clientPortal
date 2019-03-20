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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my_tickets', 'TicketController@userTickets')->name('my_tickets');
Route::get('/new_ticket', 'TicketController@create')->name('create_ticket');
Route::post('/new_ticket', 'TicketController@store');
Route::get('/{ticket_id}', 'TicketController@show')->name('ticket');

Route::post('comment', 'CommentsController@postComment');

