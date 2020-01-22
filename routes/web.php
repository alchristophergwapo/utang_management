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


use App\Models\Nangutang;
use App\Models\Items;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'UserController@getAllData')->name('home');

    Route::match(['get','post'],'/editUtang/{id?}', 'UserController@utangEdit')->name('editUtang');

    Route::post('/addUtang', 'UserController@addUtang')->name('addUtang');

    Route::post('/addInventory', 'UserController@addInventory')->name('addItem');

    Route::get('/search', 'UserController@search')->name('search');

    Route::match(['get', 'post'], '/editItem/{id?}', 'UserController@editItem')->name('editItem');

    Route::delete('/deleteUtang/{id}', 'UserController@deleteUtang')->name('deleteUtang');

    Route::delete('/deleteItem/{id}', 'UserController@deleteItem')->name('deleteItem');
});
