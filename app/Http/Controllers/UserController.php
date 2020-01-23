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
        // dd('get data');
        $nangutang = DB::table('nangutangs')->paginate(5);

        $items = DB::table('items')->paginate(5);

        return view('home',     
            ['nangutang' => $nangutang],
            ['items' => $items]
        );
    }

    public function addUtang(Request $request) {
        $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'item' => 'required|max:255',
            'quantity' => 'required|numeric|min:1|max:1000000000',
        ]);

        $res = Items::whereItem($request->item)->get();
        if(count($res) > 0) {
            // dd($res[0]->item);
            $nangutang = new Nangutang;
            $nangutang->first_name = $request->first_name;
            $nangutang->middle_name = $request->middle_name;
            $nangutang->last_name = $request->last_name;
            $nangutang->item = $request->item;
            $nangutang->quantity = $request->quantity;
            $nangutang->price = $res[0]->price;
            $nangutang->amount = $res[0]->price * $request->quantity;
            $nangutang->save();

            $res[0]->quantity = $res[0]->quantity - $request->quantity;
            $res[0]->save();

            return redirect('/');
        }
        
        // dd("test");
    }

    public function utangEdit(Request $request) {
        
        if($request->isMethod('get')){
            $utang = Nangutang::find($request->id);
            $item = Items::all();
            return view('editUtang',['persons' => $utang], ['items' => $item]);
        }else {
            $validator = $request->validate([
                'first_name' => 'required|max:255',
                'middle_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'item' => 'required|max:255',
                'quantity' => 'required|numeric|min:1|max:1000000000',
            ]);
            
            $res = Items::whereItem($request->item)->get();
            if(count($res) > 0) {
                $utang = Nangutang::find($request->id);
                $utang->first_name = $request->first_name;
                $utang->middle_name = $request->middle_name;
                $utang->last_name = $request->last_name;
                $utang->item = $request->item;
                
                if($request->quantity > $utang->quantity) {
                    $res[0]->quantity = $res[0]->quantity - $request->quantity + $utang->quantity;
                    $utang->quantity = $request->quantity;
                    $utang->price = $res[0]->price;
                    $utang->amount = $res[0]->price * $request->quantity;
                    $utang->save();
                    $res[0]->save();
                    return redirect('/');
                }else {
                    $res[0]->quantity = $res[0]->quantity - $request->quantity + $utang->quantity;
                    $utang->quantity = $request->quantity;
                    $utang->price = $res[0]->price;
                    $utang->amount = $res[0]->price * $request->quantity;
                    $utang->save();
                    $res[0]->save();
                    return redirect('/');
                }
            }

            // $utang = Nangutang::find($request->id);
            // $item = Items::all();
            // return view('editUtang',['persons' => $utang], ['items' => $item]);
        }
    }

    public function addInventory(Request $request) {
        $validator = $request->validate([
            'item' => 'required|max:255',
            'quantity' => 'required|numeric|min:1|max:1000000000',
            'price' => 'required|numeric|min:1|max:1000000000'
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
        if(empty($request->name)) {
            return redirect('/');
        } else {
            $item = Items::all();
            $person = Nangutang::whereFirstName($request->name)->get();
            return view('home',
            ['nangutang' => $person],
            ['items'=> $item] 
        );
        }
    }

    // Edit item
    public function editItem(Request $request) {

        if($request->isMethod('get')){
            $item = Items::find($request->id);
            return view('editItem',['item' => $item]);
        }elseif($request->isMethod('post')) {
            $validate = $request->validate([
                'item' => 'required|max:255',
                'quantity' => 'required|numeric|min:1|max:1000000000',
                'price' => 'required|numeric|min:1|max:1000000000'
            ]); 
    
            $item = Items::find($request->id);
            $item->item = $request->item;
            $item->quantity = $request->quantity;
            $item->price = $request->price;
            $item->save();

            return redirect('/');
        }
    }
   
    public function deleteUtang(Request $request) {
        Nangutang::findOrFail($request->id)->delete();

        return redirect('/');
    }

    public function deleteItem(Request $request) {
        Items::findOrFail($request->id)->delete();

        return redirect('/');
    }
}