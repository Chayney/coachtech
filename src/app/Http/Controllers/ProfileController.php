<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;
use App\Models\Purchase;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get();
        $items = Item::where('profile_id', $user->id)->get();
        $profile = Profile::where('user_id', $user->id)->first(['id']);
        $purchases = $profile->profilePurchases()->pluck('item_id')->toArray();
        $purchaseItems = Item::whereIn('id', $purchases)->get();
        
        return view('mypage', compact('profiles', 'items', 'purchaseItems'));
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
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }
        $profile->update([
            'image' => $path[1],
            'name' => $request->name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building
        ]);

        return redirect('/mypage/profile');  
    }
}
