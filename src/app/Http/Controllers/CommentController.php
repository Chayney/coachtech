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
        $comments = Comment::where('profile_id', $request->id)->get();
        dd($comments);
        return view('comment', compact('items', 'comments'));
    }
}
