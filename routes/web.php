<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('hello_index');
});
Route::post('/classifier', 'App\Http\Controllers\Classifier@index');
Route::get('/hello', 'App\Http\Controllers\PealthController@index');
Route::post('/uploadarchive', 'App\Http\Controllers\UploadFileController@showUploadFile');
Route::get('/uploadarchive', 'App\Http\Controllers\UploadFileController@index');
Route::get('/testing', function () {
    return view('testing');});
Route::post('/graphing', 'App\Http\Controllers\GraphController@index');
Route::get('/graphing', 'App\Http\Controllers\GraphController');
