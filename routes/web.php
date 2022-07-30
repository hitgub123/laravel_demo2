<?php

use Illuminate\Support\Facades\Route;


/*
php artisan route:list查看所有route
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome1');


use App\Http\Controllers\TestController;
use App\Http\Controllers\TestViewController;
use Illuminate\Contracts\View\View;

Route::get('/v1', [TestVIewController::class, 'v1']);
Route::get('/v2', [TestVIewController::class, 'v2']);
Route::get('/v3', [TestVIewController::class, 'v3'])->name('v3r');
// Route::match(['get', 'post'],'/v4', [TestVIewController::class, 'v4'])->name('v4r');
Route::post('/v4', [TestVIewController::class, 'v4'])->name('v4r');

Route::get('/test1', [TestController::class, 'test1']);
// Route::get('/test1', 'App\Http\Controllers\TestController@test1');

//http://localhost:3000/public/2/kitty/2/123
//http://localhost:3000/public/2/kitty/2
Route::get('/2/{name}/2/{id?}', function ($name, $id = '666') {
    echo 'hello ' . $name . ' -------- ' . $id;
});

Route::group(['prefix' => 'user'], function () {
    //http://localhost:3000/public/user/get?id=3
    Route::get('/get', [TestController::class, 'get']);
    //http://localhost:3000/public/user/del?id=3
    Route::get('/del', [TestController::class, 'del']);
    //http://localhost:3000/public/user/update?id=3
    Route::get('/update', [TestController::class, 'update']);
    //http://localhost:3000/public/user/add?id=3
    Route::get('/add', [TestController::class, 'add']);
    //http://localhost:3000/public/user/stmt?select * from user
    Route::get('/stmt', [TestController::class, 'stmt']);
});

Route::post('/route1', function () {
    echo 'hello kitty';
});
Route::match(['get', 'post'], '/route2', function () {
    echo 'hello kitty';
});
Route::any('/route3', function () {
    echo 'hello kitty';
});
