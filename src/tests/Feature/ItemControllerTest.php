<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Element;
use App\Models\Favorite;
use App\Models\Comment;

class ItemControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_favorite_items_in_user()
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
        $condition = Condition::create([
            'condition' => '新品、未使用'
        ]);
        $favoriteItem = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品1',
            'description' => '即購入出来ます',
            'price' => 300,
            'image' => 'images/product1.jpg'
        ]);
        $profile->profileFavorites()->create(['item_id' => $favoriteItem->id]);
        $response = $this->get('/');
        $response->assertViewHas('favoriteItems');
        $response->assertViewHas('items');
        $response->assertStatus(200);
        $user->delete();
        $profile->delete();
    }

    public function test_all_items_guest_user()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('items');
    }

    public function test_search_with_authenticated_user()
    {
        $user = User::factory()->create(['email' => 'e' . uniqid() . '@sample.com']);
        Auth::login($user);
        $profile = Profile::create([
            'user_id' => $user->id,
            'image' => 'images/product4.jpg',
            'name' => 'test',
            'postcode' => '111-1111',
            'address' => '東京都',
            'building' => 'レオパレス',
            'pay' => 1
        ]);
        $condition = Condition::create([
            'condition' => '新品、未使用'
        ]);
        $item1 = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品1',
            'description' => '説明1',
            'price' => 100,
            'image' => 'images/product1.jpg'
        ]);
        $item2 = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品2',
            'description' => '説明2',
            'price' => 200,
            'image' => 'images/product2.jpg'
        ]);
        $profile->profileFavorites()->create(['item_id' => $item1->id]);
        $keyword = '商品1';
        $response = $this->get('/search?keyword=' . $keyword);
        $response->assertViewHas('items');
        $response->assertViewHas('favoriteItems');
        $response->assertSee($item1->name);
        $response->assertDontSee($item2->name);
        $response->assertStatus(200);
        $user->delete();
        $profile->delete();
    }

    public function test_search_with_guest_user()
    {
        $user = User::factory()->create(['email' => 'e' . uniqid() . '@sample.com']);
        $profile = Profile::create([
            'user_id' => $user->id,
            'image' => 'images/product4.jpg',
            'name' => 'test',
            'postcode' => '111-1111',
            'address' => '東京都',
            'building' => 'レオパレス',
            'pay' => 1
        ]);
        $condition = Condition::create([
            'condition' => '新品、未使用'
        ]);
        $item1 = Item::create([
            'name' => '商品1',
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'description' => '説明1',
            'price' => 100,
            'image' => 'images/product1.jpg'
        ]);
        $item2 = Item::create([
            'name' => '商品2',
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'description' => '説明2',
            'price' => 200,
            'image' => 'images/product2.jpg'
        ]);
        $keyword = '商品1';
        $response = $this->get('/search?keyword=' . $keyword);
        $response->assertViewHas('items');
        $response->assertSee($item1->name);
        $response->assertDontSee($item2->name);
        $response->assertStatus(200);
        $user->delete();
        $profile->delete();
        $item1->delete();
        $item2->delete();
    }

    public function test_item_detail_with_related_data()
    {
        $user = User::factory()->create(['email' => 'e' . uniqid() . '@sample.com']);
        $profile = Profile::create([
            'user_id' => $user->id,
            'image' => 'images/product4.jpg',
            'name' => 'test',
            'postcode' => '111-1111',
            'address' => '東京都',
            'building' => 'レオパレス',
            'pay' => 1
        ]);
        $condition = Condition::create([
            'condition' => '新品、未使用'
        ]);
        $item = Item::create([
            'name' => '商品1',
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'description' => '説明1',
            'price' => 100,
            'image' => 'images/product1.jpg'
        ]);
        $element = Element::create([
            'name' => '新品、未使用',
        ]);
        $item->elements()->attach($element);
        $response = $this->get('/item/detail?id=' . $item->id);
        $response->assertViewHas('items');
        $response->assertSee($item->name);
        $response->assertSee($item->description);
        $response->assertSee($item->price);
        $response->assertSee($item->image);
        $response->assertSee($condition->condition);
        $response->assertSee($element->name);
        $response->assertStatus(200);
        $user->delete();
        $profile->delete();
        $item->delete();
    }
}
