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

    public function address()
    {
        return view('address');
    }

    public function profile()
    {
        return view('profile');
    }
}
