<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        dd($request);
        $user = Auth::user();
        $items = Item::where('id', $request->item_id)->get();

        return view('comment', compact('items', 'profiles'));
    }
}
