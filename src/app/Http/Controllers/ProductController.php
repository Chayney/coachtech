<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;

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
