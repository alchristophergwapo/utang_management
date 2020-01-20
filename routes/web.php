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

    Route::get('/', function () {
        return view('home', [
            'nangutang' => Nangutang::orderBy('created_at', 'asc')->get(),
            'items' => Items::orderBy('created_at', 'asc')->get()
        ]);
    });

    Route::get('/addNangutang', function() {
        return view('addNangutang');
    });

    Route::get('addItem' , function() {
        return view('addItem');
    });

    Route::post('/addUtang', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'item' => 'required|max:255',
            'quantity' => 'required',
            'amount' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        } else {
            $nangutang = new Nangutang;
            $nangutang->first_name = $request->first_name;
            $nangutang->middle_name = $request->middle_name;
            $nangutang->last_name = $request->last_name;
            $nangutang->item = $request->item;
            $nangutang->quantity = $request->quantity;
            $nangutang->price = $request->price;
            $nangutang->amount = $request->price * $request->quantity;
            $nangutang->save();

            return redirect('/');
        }

        // Create The Task...
    });

    Route::post('addInventory', function(Request $request) {
        $validator = Validator::make($request->all(), [
            'item' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        } else {
            $item = new Items;
            $item->item = $request->item;
            $item->quantity = $request->quantity;
            $item->price = $request->price;
            $item->save();

            return redirect('/');
        }
    });

    Route::delete('/utang/{id}', function($id) {
        Nangutang::findOrFail($id)->delete();

        return redirect('/');
    });

    Route::delete('/item/{id}', function($id) {
        Items::findOrFail($id)->delete();

        return redirect('/');
    });
});
