<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/kas/{kelas}/{bulan}/{tahun}', 'ApiKasController@show');
Route::get('/kas/{kelas}/{tahun}', 'ApiKasController@showKasTahunan');
