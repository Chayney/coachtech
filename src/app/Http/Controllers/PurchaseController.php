<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Category;
use App\Models\Element;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Item::where('id', $request->id)->get();
        $profiles = Profile::where('user_id', $user->id)->get();

        return view('purchase', compact('items', 'profiles'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        if (empty($profile->pay)) {
            return redirect('/purchase/pay/{item_id}');
        } else {
            $payment = Purchase::create([
                'profile_id' => $profile->id,
                'item_id' => $request->id,
            ]);
              
            return view('thanks');
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $items = Item::where('id', $request->id)->get();

        return view('address', compact('items'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $request->only(['postcode', 'address', 'building']);        
        Profile::find($user->id)->update($profile);
        $items = Item::where('id', $request->id)->get();
        $profiles = Profile::where('user_id', $user->id)->get();

        return view('purchase', compact('items', 'profiles'));
    }

    public function revise(Request $request)
    {
        $user = Auth::user();
        $items = Item::where('id', $request->id)->get();

        return view('pay', compact('items'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $payment = $request->only(['pay']);        
        Profile::find($user->id)->update($payment);
        $items = Item::where('id', $request->id)->get();
        $profiles = Profile::where('user_id', $user->id)->get();

        return view('purchase', compact('items', 'profiles'));
    }
}
