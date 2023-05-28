<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController1 extends Controller
{
    public function indexs()
    {
        return view('user.index');
    }
    public function create()
    {
        return view('user.create1');
    }
    public function edit1()
    {
        return view('user.edit1');
    }
}
