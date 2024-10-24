<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sell()
    {
        return view('sell');
    }

    public function address()
    {
        return view('address');
    }

    public function profile()
    {
        return view('profile');
    }
}
