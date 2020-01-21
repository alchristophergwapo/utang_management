<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nangutang;
use App\Models\Items;

class UserController extends Controller
{
    public function getAllData() {
        $nangutang = DB::select('select * from nangutangs');

        $items = DB::select('select * from items');

        return view('home', 
            ['nangutang' => $nangutang],
            ['items' => $items]
        );
    }

    public function addUtang(Request $request) {
        $validator = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'item' => 'required|max:255',
            'quantity' => 'required',
            'amount' => 'nullable'
        ]);

        if (!$validator) {
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
    }

    public function utangEdit(Request $request) {
        $utang = Nangutang::where('id',$request->id)->get();

        $validate = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'item' => 'required|max:255',
            'quantity' => 'required',
            'amount' => 'nullable'
        ]);

        if (!$validate) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        } else {
            $utang->first_name = $request->first_name;
            $utang->middle_name = $request->middle_name;
            $utang->last_name = $request->last_name;
            $utang->item = $request->item;
            $utang->quantity = $request->quantity;
            $utang->price = $request->price;
            $utang->amount = $request->price * $request->quantity;
    
            $utang->save();
    
            return redirect('/');
        }
    }

    public function addInventory(Request $request) {
        $validator = $request->validate([
            'item' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        if (!$validator) {
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
    }

    public function search(Request $request) {
        $person = Nangutang::whereFirstName($request->name)->get();
        $item = Items::all();

        return view('home',
            ['nangutang' => $person],
            ['items'=> $item] 
        );
    }
    function welcome() {
        return view('test.home');
    }

    function addNangutang() {
        return view('addNangutang');
    }

    public function editUtang() {
        
        return view('editUtang');
    }

    function addItem() {
        return view('   addItem');
    }
}
