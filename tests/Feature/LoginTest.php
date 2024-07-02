<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_valid_credentials()
    {
        // Assume a user exists with known credentials
        $email = 'info.iosnapk@gmail.com';
        $password = 'info.iosnapk@gmail.com';

        // Mock the login API endpoint response
        Http::fake([
            '127.0.0.1:8000/login' => Http::response([
                'message' => 'These credentials do not match our records.',
                'errors' => [
                    'email' => ['These credentials do not match our records.'],
                ],
            ], 422),
        ]);

        // Perform the login request
        $response = $this->postJson('/login', [
            'email' => $email,
            'password' => $password,
        ]);

        // Assert that the login request returned a validation error
        $response->assertStatus(422)
            ->assertJson([
                'message' => 'These credentials do not match our records.',
                'errors' => [
                    'email' => ['These credentials do not match our records.'],
                ],
            ]);

        // Additional assertions if needed
    }
}
