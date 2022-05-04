<?php

use App\Http\Controllers\Dashboard\BehaviorController;
use App\Http\Controllers\Dashboard\Widget\ButtonController;
use App\Http\Controllers\Dashboard\Widget\ChipController;
use App\Http\Controllers\Dashboard\Widget\ImageController;
use App\Http\Controllers\Dashboard\Widget\MixController;
use App\Http\Controllers\Dashboard\Widget\TextController;
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


Route::group(['prefix' => 'dashboard/widget','middleware'=>'auth'], function() {
    //
    Route::resource('chip', ChipController::class);
    Route::resource('button', ButtonController::class);
    Route::resource('text', TextController::class);
    Route::resource('image', ImageController::class);


    Route::get('mix/{group}/edit',[MixController::class,'edit'])->name('mix.edit');
    Route::post('mix/{group}',[MixController::class,'store'])->name('mix.store');
    Route::patch('mix/{group}',[MixController::class,'update'])->name('mix.update');
    Route::get('mix',[MixController::class,'index'])->name('mix.index');

});


Route::group(['prefix' => 'dashboard','middleware'=>'auth'], function() {
    Route::post('behavior/{type}/{id}',[BehaviorController::class,'save'])->name('behavior.save');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
