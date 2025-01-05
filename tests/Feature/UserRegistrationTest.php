<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_fails_when_password_is_too_short()
    {
        $response = $this->post('/register', [
            'username' => 'validuser',
            'email' => 'user@example.com',
            'password' => 'short' // Password too short
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertDatabaseMissing('users', ['email' => 'user@example.com']);
    }

    public function test_registration_fails_when_username_is_too_short()
    {
        $response = $this->post('/register', [
            'username' => 'ab', // Username too short
            'email' => 'user@example.com',
            'password' => 'validpassword',
        ]);

        $response->assertSessionHasErrors(['username']);
        $this->assertDatabaseMissing('users', ['email' => 'user@example.com']);
    }

    public function test_successful_registration_redirects_to_homepage()
    {
        $response = $this->post('/register', [
            'username' => 'validuser',
            'email' => 'user@example.com',
            'password' => 'validpassword',
        ]);

        $response->assertRedirect('/');
    }

    public function test_database_contains_newly_registered_user()
    {
        $response = $this->post('/register', [
            'username' => 'validuser',
            'email' => 'user@example.com',
            'password' => 'validpassword',
        ]);

        $this->assertDatabaseHas('users', [
            'username' => 'validuser',
            'email' => 'user@example.com',
        ]);
    }
}
