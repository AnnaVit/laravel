<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\MainController;



/*
a. Страницу приветствия.
b. Страницу категорий новостей.
c. Страницу вывода новостей по конкретной категории.
d. Страницу вывода конкретной новости.
**/

Route::get('/', [MainController::class, 'index']);



/** Админка новостей */
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
], function (){
    Route::get('/',  [ AdminNewsController::class, 'index' ])
        ->name('index' );
    Route::get('/create', [ AdminNewsController::class, 'create'])
        ->name('create');
    Route::get('/update', [ AdminNewsController::class, 'update'])
        ->name('update');
    Route::get('/delete', [ AdminNewsController::class, 'delete'])
        ->name('delete');
});
/**Категории*/

Route::group([
    'prefix' => '/news/category',
    'as' => 'news::category',

], function (){
    Route::get('/', [NewsController::class, 'categories'])
        ->name('');

    Route::get('/{idCategory}', [NewsController::class,'news'])
        ->name('::idCategory');

    Route::get('/{idCategory}/{id}', [NewsController::class,'article'])
        ->name('::idCategory::id');
});


