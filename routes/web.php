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

    Route::get('/', 'UserController@getAllData');

    Route::get('/addNangutang', 'UserController@addNangutang');

    Route::get('/editUtang', 'UserController@editUtang');

    Route::get('addItem' , 'UserController@addItem');

    Route::post('/addUtang', 'UserController@addUtang');

    Route::post('addInventory', 'UserController@addInventory');

    Route::get('search', 'UserController@search');

    Route::delete('/utang/{id}', function($id) {
        Nangutang::findOrFail($id)->delete();

        return redirect('/');
    });

    Route::delete('/item/{id}', function($id) {
        Items::findOrFail($id)->delete();

        return redirect('/');
    });
});
