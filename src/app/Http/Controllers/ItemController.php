<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Item::all();

        return view('index', compact('items'));
    }

    public function detail(Request $request)
    {
        $items = Item::with(['category.element','condition'])->where('id', $request->id)->get();
        
        return view('detail', compact('items'));
    }
}
