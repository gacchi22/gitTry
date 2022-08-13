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

// Route::get('hello', function () {
    // return '<html>
            // <body>
                // <h1>HelloWorld</h1>
                // <p>TEST page.</p>
            // </body>
            // </html>';
// });

Route::get('hello', 'HelloController@index')->middleware(HelloMiddleware::class);

Route::get('hello/test', 'HelloController@hello');

Route::get('hello/validate', 'HelloController@validateForm');

Route::post('hello/validate', 'HelloController@validatePost');

Route::get('hello/{id?}/{pass?}', 'HelloController@index');

Route::get('access', 'HelloController@access');

Route::post('hello', 'HelloController@post');

Route::get('hello/add', 'HelloController@add');

Route::post('hello/add', 'HelloController@create');

Route::get('hello/edit', 'HelloController@edit');

Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');

Route::post('hello/del', 'HelloController@remove');