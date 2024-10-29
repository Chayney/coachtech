<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Item::where('id', $request->id)->get();
        $profiles = Profile::where('user_id', $user->id)->get();

        return view('purchase', compact('items', 'profiles'));
    }

    // 決済用
    public function create(Request $request)
    {
        $user = Auth::user();
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $items = Item::where('id', $request->id)->get();

        return view('address', compact('items'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $request->only(['postcode', 'address', 'building']);        
        Profile::find($user->id)->update($profile);
        $items = Item::where('id', $request->id)->get();
        $profiles = Profile::where('user_id', $user->id)->get();

        return view('purchase', compact('items', 'profiles'));
    }
}
