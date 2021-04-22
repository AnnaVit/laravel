<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\MainController;
use \App\Http\Controllers\Test;


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

    Route::get('/{nameCategory}', [NewsController::class,'news'])
        ->name('::nameCategory');

    Route::get('/{nameCategory}/{id}', [NewsController::class,'article'])
        ->name('::nameCategory::id');
});


/*
 * Route внутри route
 * */


Route::group([
    'prefix' => '/test',
    'as' => 'test'

], function() {
    Route::get('/', [Test::class, 'test'])
        ->name('');

    Route::group([
        'prefix' => '/test2',
        'as' => 'test2'
    ], function(){
        Route::get('/',[Test::class, 'test2'])
            ->name('');
    });
});
