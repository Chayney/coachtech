<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Item;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function detail()
    {
        $products = Product::with(['category.item','condition'])->get();
        return view('detail', compact('products'));
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

    public function mypage()
    {
        $products = Product::all();
        return view('mypage', compact('products'));
    }
}
