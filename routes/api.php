<?php

use App\Http\Controllers\Api\Auth\AuthController;
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


Route::get('/categories' , [CategoryController::class , 'index']);

Route::get('categories/{id}/books' , [CategoryController::class , 'getBooks']);

Route::get('books/{id}' , [BooksController::class , 'show']);

Route::controller(AuthController::class)->prefix('auth')->group(function (){
   Route::post('register' , 'register');
   Route::post('login' , 'login');
   Route::post('logout' , 'logout')->middleware('auth:api');
   Route::post('update-profile' , 'updateProfile')->middleware('auth:api');
   Route::get('profile' , 'profile')->middleware('auth:api');
   Route::post('scan' , 'scanQr')->middleware('auth:api');
});
