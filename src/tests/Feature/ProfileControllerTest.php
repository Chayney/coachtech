<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Condition;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class ProfileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sell_items_purchase_items_in_user()
    {
        $user = User::factory()->create(['email' => 'e' . uniqid() . '@sample.com']);
        $this->actingAs($user);
        $profile = Profile::create([
            'user_id' => $user->id,
            'image' => 'images/product4.jpg',
            'name' => 'test',
            'postcode' => '111-1111',
            'address' => '東京都',
            'building' => 'レオパレス',
            'pay' => 1
        ]);
        $profile = Profile::where('user_id', $user->id)->first();
        $condition = Condition::create([
            'condition' => '新品、未使用'
        ]);
        $item = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品1',
            'description' => '説明',
            'price' => 1000,
            'image' => 'images/product.jpg',
        ]);
        $purchases = Purchase::create([
            'profile_id' => $profile->id,
            'item_id' => $item->id
        ]);
        $purchaseItems = Item::whereIn('id', $purchases)->get();
        $response = $this->get('/mypage');
        $response->assertStatus(200); 
        $response->assertViewHas('profiles');
        $response->assertViewHas('items');
        $response->assertViewHas('purchaseItems');
        $response->assertSee($profile->name);
        $response->assertSee($item->id);
        $user->delete();
        $profile->delete();
        $item->delete();
    }

    public function test_edit_profile_in_user()
    {
        $user = User::factory()->create(['email' => 'e' . uniqid() . '@sample.com']);
        $this->actingAs($user);
        $profile = Profile::create([
            'user_id' => $user->id,
            'image' => 'images/product4.jpg',
            'name' => 'test',
            'postcode' => '111-1111',
            'address' => '東京都',
            'building' => 'レオパレス',
            'pay' => 1
        ]);
        $response = $this->get('/mypage/profile');
        $response->assertStatus(200);
        $response->assertViewHas('profiles');
        $response->assertSee($profile->name);
        $response->assertSee($profile->image);
        $response->assertSee($profile->postcode);
        $response->assertSee($profile->address);
        $user->delete();
        $profile->delete();
    }
}
