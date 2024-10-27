<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;

class SellController extends Controller
{
    public function index()
    {
        $categories = Category::with('element')->get();
        $conditions = Condition::all();
        $user = Auth::user();
        
        return view('sell', compact('categories', 'conditions'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $item = Item::where('profile_id', $profile->user_id)->first();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }
        $item = Item::create([
            'profile_id' => $profile->user_id,
            'image' => $path[1],
            'category_id' => $request->category_id,
            'condition_id' => $request->condition_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
            
        return redirect('/mypage');           
    }
}
