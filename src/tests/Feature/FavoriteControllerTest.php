<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Condition;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_favorite()
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
        $item = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品1',
            'description' => '商品説明',
            'price' => 1000,
            'image' => 'images/product.jpg'
        ]);
        $response = $this->post('/favorite/store', [
            'item_id' => $item->id
        ]);
        $this->assertDatabaseHas('favorites', [
            'profile_id' => $profile->id,
            'item_id' => $item->id,
        ]);
        $response->assertRedirect();
        $response->assertSessionHas('success', 'お気に入りに追加しました');
        $user->delete();
        $profile->delete();
        $item->delete();
    }

    public function test_destroy_favorite()
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
        $item = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品1',
            'description' => '商品説明',
            'price' => 1000,
            'image' => 'images/product.jpg'
        ]);
        $favorite = Favorite::create([
            'profile_id' => $profile->id,
            'item_id' => $item->id
        ]);
        $response = $this->delete('/favorite/destroy', [
            'id' => $favorite->id,
        ]);
        $response->assertRedirect();
        $user->delete();
        $profile->delete();
        $item->delete();
    }
}
