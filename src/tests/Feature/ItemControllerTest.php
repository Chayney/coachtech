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

class ItemControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $user = User::factory()->create();
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
        $items = Item::create([
            'profile_id' => $profile->id,
            'condition_id' => $condition->id,
            'name' => '商品1',
            'description' => '即購入出来ます',
            'price' => 300,
            'image' => 'images/product1.jpg'
        ]);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('items');
    }
}
