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
        $items = Item::where('name', $request->name)->where('id', $request->id)->withCount('favorites')->withCount('comments')->get();
        $comments = Comment::with('commentProfile')->where('item_id', $request->item_id)->get();

        return view('comment', compact('items', 'comments'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first(['id']);
        if (!$profile) {
            return redirect('/mypage');
        } else {
            $comment = Comment::create([
                'profile_id' => $profile->id,
                'item_id' => $request->item_id,
                'comment' => $request->comment
            ]);
                
            return redirect()->back();
        }    
    }

    public function edit(Request $request)
    {
        $items = Item::where('name', $request->name)->where('id', $request->id)->withCount('favorites')->withCount('comments')->get();
        $comments = Comment::with('commentProfile')->where('item_id', $request->item_id)->get();

        return view('delete', compact('items', 'comments'));
    }

    public function destroy(Request $request)
    {
        Comment::find($request->id)->delete();
        
        return redirect()->back();
    }
}
