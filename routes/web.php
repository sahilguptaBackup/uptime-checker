<?php

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

// Route::get('/posts/{post}', function ($post) {
//     $posts = [
//         'one' => 'First',
//         'two' => 'Second'
//     ];
//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });

// Route::get('/i', 'InfoController@i');
// Route::get('/fs', 'InfoController@fs');
Route::get('/', 'UptimeCheckerController@list');

Route::post('/uptime', 'UptimeCheckerController@save')->name('uptime.save');
