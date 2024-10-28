<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Item::where('id', $request->id)->get();

        return view('purchase', compact('items'));
    }
}
