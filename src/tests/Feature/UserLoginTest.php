<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password')
        ]);
        $loginData = [
            'email' => $user->email,
            'password' => 'password'
        ];
        $response = $this->post(route('login'), $loginData);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}
