<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $items = Item::where('name', $request->name)->get();
        $comments = Comment::with('commentProfile')->where('item_id', $request->item_id)->get();

        return view('comment', compact('items', 'comments'));
    }
}
