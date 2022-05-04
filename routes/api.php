<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ButtonController;
use App\Http\Controllers\Api\ChipController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\MixController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\TextController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[AuthController::class,'login']);

Route::group(['middleware' =>'auth:api'] , function () {

    Route::get('verify',[UserController::class,'verify']);
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('button/all',[ButtonController::class,'all'])->middleware('auth:api');
    Route::get('button/group/{group}',[ButtonController::class,'group']);
    Route::resource('button',ButtonController::class)->only('index','show');

    Route::get('chip/group/{group}',[ChipController::class,'group']);
    Route::get('chip/all',[ChipController::class,'all']);
    Route::resource('chip',ChipController::class)->only('index','show');

    Route::get('image/group/{group}',[ImageController::class,'group']);
    Route::get('image/all',[ImageController::class,'all']);
    Route::resource('image',ImageController::class)->only('index','show');

    Route::get('text/group/{group}',[TextController::class,'group']);
    Route::get('text/all',[TextController::class,'all']);
    Route::resource('text',TextController::class)->only('index','show');

    Route::get('group/all',[GroupController::class,'all']);
    Route::resource('group',GroupController::class)->only('index','show');

    Route::get('mix/{group}',[MixController::class,'show']);


    Route::resource('note',NoteController::class)->only('index','show','store','destroy');
    Route::post('note/{note}',[NoteController::class,'update']);

});




