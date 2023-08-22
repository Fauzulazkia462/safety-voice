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


Route::get('/', 'HomeController@index');
Route::get('/export', 'ExportController@index');
Route::post('/submit', 'HomeController@insert')->name('insert');
Route::get('/export-excel', 'ExportController@exportexcel')->name('exportexcel');
Route::post('/delete-data', 'ExportController@deletedata')->name('deletedata');
Route::post('/update', 'ExportController@update');
Route::post('/assign-ga', 'ExportController@assGa');
Route::post('/assign-eng', 'ExportController@assEng');
Route::post('/done', 'ExportController@done');