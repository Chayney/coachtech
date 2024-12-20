<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;

class ItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user && $user->userProfile) {
            $profile = Profile::where('user_id', $user->id)->first(['id']);
            $favorites = $profile->profileFavorites()->pluck('item_id')->toArray();
            $favoriteItems = Item::whereIn('id', $favorites)->get();
            $items = Item::all();
            
            return view('index', compact('favoriteItems', 'items'));
        } else {
            $items = Item::all();
            
            return view('index', compact('items'));
        }  
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user && $user->userProfile) {
                $profile = Profile::where('user_id', $user->id)->first(['id']);
                $favorites = $profile->profileFavorites()->pluck('item_id')->toArray();
                $favoriteItems = Item::whereIn('id', $favorites)->KeywordSearch($request->keyword)->get();   
                $product = new Item;
                $items = $product->KeywordSearch($request->keyword)->get();

                return view('index', compact('items', 'favoriteItems'));
            }
        } else {
            $product = new Item;
            $items = $product->KeywordSearch($request->keyword)->get();

            return view('index', compact('items'));
        }
    }

    public function detail(Request $request)
    {
        $items = Item::with(['elements','condition'])->where('id', $request->id)->withCount('favorites')->withCount('comments')->get();
            
        return view('detail', compact('items'));
    }
}
