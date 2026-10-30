<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login_from_the_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_seeded_user_can_log_in_and_see_the_dashboard(): void
    {
        $user = User::create([
            'name' => 'Sai',
            'email' => 'nurse.argoncillo@bakuna.test',
            'password' => Hash::make('bakuna2026'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'bakuna2026',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_authenticated_user_can_log_out(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }
}
