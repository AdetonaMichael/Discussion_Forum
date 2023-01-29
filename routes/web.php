<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\UsersController;
use App\Models\Discussion;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('discussions/{discussion}/replies/{reply}/mark-as-best-reply', [DiscussionController::class,'reply'])->name('discussions.best-reply');

Route::group(['prefix'=>'users'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::resource('discussions', DiscussionController::class);
Route::resource('users', UsersController::class);
Route::resource('discussions/{discussion}/reply', RepliesController::class);
Route::post('/store_channel',[HomeController::class, 'store_channel'])->name('store-channel');
