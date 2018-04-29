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

    Route::get('/', 'HomeController@index');
    Route::get('/checklist/{id}', 'ChecklistItem2Controller@index');
    Route::get('/c/{token}', 'ChecklistItem2Controller@token');
    Route::get('/home', 'ChecklistController@index')->middleware('auth');
    Route::post('/add-new-item', 'ChecklistItem2Controller@store');
    Route::post('/add-new-checklist', 'ChecklistController@store');
    Route::post('/update_checklist_item', 'ChecklistItem2Controller@update');
    Route::post('/update_checklist_item_undone', 'ChecklistItem2Controller@setTaskUndone');


    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



