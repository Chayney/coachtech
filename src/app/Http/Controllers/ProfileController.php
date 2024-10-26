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
        $profiles = Profile::where('user_id', $user->id)->get();
        $products = Product::all();
        return view('mypage', compact('profiles', 'products'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get();
        return view('profile', compact('profiles'));
    }

    public function update(Request $request)
    {
        dd($request);
        $user = Auth::user();
        $profile = $request->only(['name', 'postcode', 'address', 'building']);
        return redirect()->back();
    }
}
