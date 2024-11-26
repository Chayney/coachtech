<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\Item;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first(['id']);
        if (!$profile) {
            return redirect('/mypage');
        } else {
            $item_id = $request->item_id;
            $favoritemark = Favorite::where('profile_id', $profile->id)->where('item_id', $item_id)->first();
            if (!$favoritemark) {
                Favorite::create([
                    'profile_id' => $profile->id,
                    'item_id' => $item_id
                ]);

                return redirect()->back()->with('success', 'お気に入りに追加しました');
            }
        }
        
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first(['id']);
        $item_id = $request->item_id;
        Favorite::where('profile_id', $profile->id)->where('item_id', $item_id)->delete();

        return redirect()->back();
    }
}
