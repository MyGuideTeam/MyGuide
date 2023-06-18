<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BlindRelativeLinkingController;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\CategoryController;
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

Route::controller(CategoryController::class)->prefix('categories')->group(function (){
   Route::get('/' , 'index');
   Route::get('/{id}/books' , 'getBooks');
});

Route::controller(BooksController::class)->prefix('books')->group(function (){
   Route::get('/{id}' , 'show');
});


Route::controller(AuthController::class)->prefix('auth')->group(function (){
   Route::post('register' , 'register');
   Route::post('login' , 'login');
   Route::post('logout' , 'logout')->middleware('auth:api');
   Route::post('update-profile' , 'updateProfile')->middleware('auth:api');
   Route::get('profile' , 'profile')->middleware('auth:api');
});

Route::controller(BlindRelativeLinkingController::class)->middleware('auth:api')->group(function (){
    Route::get('linkedProfile' , 'linkedProfile');
    Route::post('scan' , 'scanQr');
    Route::post('location' , 'sendLocation');

});
