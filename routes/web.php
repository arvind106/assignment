<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArvindController;
use App\Http\Controllers\HostController;


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
  return view('welcomenew');

});
  Route::post('hosts/import', [HostController::class, 'import']);
  Route::get('hosts/chart', [HostController::class, 'chart']);
  Route::resource('hosts', HostController::class);
  Route::resource('users', UserController::class);
  Route::post('/uploadimg', [ArvindController::class, 'uploadimg']);





