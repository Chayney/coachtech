<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class UserRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_register()
    {
        $data = [
            'email' => 'test@test.com',
            'password' => 'password',
        ];
        $response = $this->post(route('register'), $data);
        $this->assertDatabaseHas('users', [
            'email' => 'test@test.com',
        ]);
        $response->assertRedirect('/');
    }
}
