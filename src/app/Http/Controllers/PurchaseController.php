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
        if (empty($profile->pay)) {
            return redirect('/purchase/pay/{item_id}');
        } elseif ($profile->pay == 1) {
            Stripe::setApiKey(config('services.stripe.secret'));
            $token = $request->input('stripeToken');
            $itemId = $request->input('item_id');
            PaymentIntent::create([
                'amount' => 100,
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
