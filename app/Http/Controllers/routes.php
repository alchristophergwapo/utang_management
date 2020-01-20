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
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('nangutang', [
            'nangutang' => Nangutang::orderBy('created_at', 'asc')->get()
        ]);
    });

    Route::post('/addUtang', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'item' => 'required|max:255',
            'quantity' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        } else {
            $nangutang = new Nangutang;
            $nangutang->first_name = $request->first_name;
            $nangutang->middle_name = $request->middlename;
            $nangutang->last_name = $request->last_name;
            $nangutang->item = $request->item;
            $nangutang->quantity = $request->quantity;
            $nangutang->price = $request->price;
            $nangutang->amount = $request->quantity * $request->price;
            $nangutang->save();

            return redirect('/');
        }

        // Create The Task...
    });
});