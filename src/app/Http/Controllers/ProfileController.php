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
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $image = $request->file('image');
        $imagePath = $image->store('public/images');
        $profile->update([
            'image' => $imagePath,
            'name' => $request->name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        return redirect('/mypage/profile');
    }
}
