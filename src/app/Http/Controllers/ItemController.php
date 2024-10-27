<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;

class ItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function detail()
    {
        $items = Item::with(['category.element','condition'])->get();
        return view('detail', compact('items'));
    }

    public function sell()
    {
        $categories = Category::with('element')->get();
        dd($categories);
        $conditions = Condition::all();
        $user = Auth::user();
        return view('sell', compact('categories', 'conditions'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        
    }

    public function address()
    {
        return view('address');
    }

    public function profile()
    {
        return view('profile');
    }
}
