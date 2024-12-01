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
use Stripe\Stripe;
use Stripe\PaymentIntent;

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
        if (empty($profile->address) && empty($profile->pay)) {
            return redirect()->back()->with('alert', '支払い先と配送先の登録をしてください。');
        } elseif ($profile->pay == 1 && $profile->address) {
            Stripe::setApiKey(config('services.stripe.secret'));
            $itemId = $request->input('item_id');
            $amount = $request->input('amount');
            PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'jpy',
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never'
                ],
            ]);
            Purchase::create([
                'profile_id' => $profile->id,
                'item_id' => $itemId,
            ]);

            return view('thanks');
        } elseif (($profile->pay == 2 || $profile->pay == 3) && $profile->address){
            $payment = Purchase::create([
                'profile_id' => $profile->id,
                'item_id' => $request->id,
            ]);
              
            return view('thanks');
        } elseif (empty($profile->pay)) {
            return redirect()->back()->with('alert', '支払い先の登録をしてください。');
        } else {
            return redirect()->back()->with('alert', '配送先の登録をしてください。');
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
        $request->validate([
            'postcode' => 'required',
            'address' => 'required'
        ], [
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください'
        ]);
        $user = Auth::user();
        $profile = $request->only(['postcode', 'address', 'building']);        
        Profile::find($user->id)->update($profile);
        $id = $request->id;

        return redirect("/purchase/{item_id}?id={$id}")->with('success', '配送先の登録が完了しました');
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
        $id = $request->id;

        return redirect("/purchase/{item_id}?id={$id}")->with('success', '支払い先の登録が完了しました');
    }
}
