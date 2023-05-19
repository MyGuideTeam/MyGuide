<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BookCategoriesController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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
require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::view('/' , 'admin.index')->name('home');

    Route::controller(AdminsController::class)->prefix('admins')->group(function (){
        Route::get('/' , 'index')->name('admins.index');
        Route::get('/create' , 'create')->name('admins.create');
        Route::post('/' , 'store')->name('admins.store');
        Route::get('/{id}' , 'edit')->name('admins.edit');
        Route::post('/{id}' , 'update')->name('admins.update');
        Route::delete('/{id}' , 'delete')->name('admins.delete');
    });


    Route::controller(UsersController::class)->prefix('users')->group(function (){
        Route::get('/' , 'index')->name('users.index');
        Route::get('/create' , 'create')->name('users.create');
        Route::post('/' , 'store')->name('users.store');
        Route::get('/{id}' , 'edit')->name('users.edit');
        Route::put('/{id}' , 'update')->name('users.update');
        Route::delete('/{id}' , 'delete')->name('users.destroy');
    });

    Route::controller(BookCategoriesController::class)->prefix('categories')->group(function (){
        Route::get('/' , 'index')->name('categories.index');
        Route::get('/create' , 'create')->name('categories.create');
        Route::post('/' , 'store')->name('categories.store');
        Route::delete('/{id}' , 'delete')->name('categories.destroy');
    });

    Route::controller(BooksController::class)->prefix('books')->group(function (){
        Route::get('/' , 'index')->name('books.index');
        Route::get('/create' , 'create')->name('books.create');
        Route::post('/' , 'store')->name('books.store');
        Route::get('/{id}' , 'edit')->name('books.edit');
        Route::put('/{id}' , 'update')->name('books.update');
        Route::delete('/{id}' , 'delete')->name('books.destroy');
    });








});


