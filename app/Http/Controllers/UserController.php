<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function welcome() {
        return view('test.home');
    }

    function addNangutang() {
        return view('test.addNangutang');
    }

    function addItem() {
        return view('test.addItem');
    }
}
