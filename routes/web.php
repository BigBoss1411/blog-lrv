<?php

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

Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@submitLogin')->name('auth.login-submit');
Route::post('logout', 'AuthController@logout')->name('auth.logout');

Route::get('test', function () {
    $user = new \App\Models\User;
    $user->fullname = 'Quản lý';
    $user->role = config('role.moderator');
    $user->email = 'quanly@gmail.com';
    $user->password = bcrypt('123456789');
    $user->save();
    echo "Create User success";
});

Route::get('test2', function () {
    $user = new \App\Models\User;
    $user->fullname = 'Quản lý';
    $user->role = config('role.moderator');
    $user->email = 'quanly@gmail.com';
    $user->password = bcrypt('123456789');
    $user->save();
    echo "Create User success";
});

Route::get('test3', function () {
    $user = new \App\Models\User;
    $user->fullname = 'Quản lý';
    $user->role = config('role.moderator');
    $user->email = 'quanly@gmail.com';
    $user->password = bcrypt('123456789');
    $user->save();
    echo "Create User success";
});

Route::get('test4', function () {
    $user = new \App\Models\User;
    $user->fullname = 'Quản lý';
    $user->role = config('role.moderator');
    $user->email = 'quanly@gmail.com';
    $user->password = bcrypt('123456789');
    $user->save();
    echo "Create User success";
});


Route::get('/', 'PageController@homepage');
Route::get('category/{id}', 'CategoryController@show')->name('category.show');
Route::get('posts/{id}', 'PostController@show')->name('post.show');
Route::put('posts/{id}/status', 'PostController@updateStatus')->name('post.update-status');

// POLICY


Route::group([
    'middleware' => 'auth',
    'prefix' => 'backend/'
], function () {
    Route::get('/', 'PageController@index')->name('dashboard');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::put('/profile', 'UserController@updateProfile')->name('user.update-profile');

    Route::get('/change-password', 'UserController@changePassword')->name('user.change-password');
    Route::put('/change-password', 'UserController@submitChangePassword')->name('user.submit-change-password');

    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::post('/posts', 'PostController@store')->name('posts.store');
    Route::put('/posts/{id}', 'PostController@update')->name('posts.update');
    Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy');
    Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');

    Route::get('/calculator', 'CalculatorController@getFormCalculator');
    Route::post('/calculator', 'CalculatorController@calculate')->name('calc.calculate');
});

