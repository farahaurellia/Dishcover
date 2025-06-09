<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp(); 

        $this->user = User::create([
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('validpassword'), 
            'profilepicture_url' => asset('images/profile1.jpg'),
        ]);
    }

    public function test_login_fails_when_password_does_not_match()
    {
        $response = $this->post('/login', [
            'username' => 'testuser',
            'password' => 'wrongpassword', 
        ]);

        $response->assertSessionHasErrors(); 
        $this->assertGuest(); 
    }

    public function test_login_fails_when_username_does_not_match()
    {
        $response = $this->post('/login', [
            'username' => 'wronguser', 
            'password' => 'validpassword',
        ]);

        $response->assertSessionHasErrors(); 
        $this->assertGuest(); 
    }

    public function test_successful_login_redirects_to_homepage()
    {
        $response = $this->post('/login', [
            'loginusername' => 'testuser', 
            'loginpassword' => 'validpassword',
        ]);

        $response->assertRedirect('/'); 

        $this->assertAuthenticatedAs($this->user);
    }

    public function test_username_is_unique()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        User::create([
            'username' => 'testuser', 
            'email' => 'newuser@example.com',
            'password' => bcrypt('newpassword'),
        ]);
    }

}
