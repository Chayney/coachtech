<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Item;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profiles = Profile::where('id', $user->id)->get();
        $products = Product::all();
        return view('mypage', compact('profiles', 'products'));
    }
}
