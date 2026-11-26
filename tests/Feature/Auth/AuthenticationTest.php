<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertOk()
            ->assertSee('NIA PBSB')
            ->assertSee('Portal CSSMoRA PBSB')
            ->assertSee('AMAN')
            ->assertDontSee('Ingat saya')
            ->assertDontSee('Lupa password?')
            ->assertDontSee('Daftar di sini');
    }

    public function test_landing_page_offers_login_without_a_registration_link(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('login'))
            ->assertDontSee(route('register'));
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'name' => 'Ahmad Fauzi',
            'role' => 'pemilih',
        ]);

        $response = $this->post('/login', [
            'identifier' => $user->nia_pbsb,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home'));
        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText('Halo, Ahmad Fauzi');
    }

    public function test_users_can_authenticate_using_their_email_as_a_compatibility_identifier(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'identifier' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_accounts_cannot_authenticate(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->post('/login', [
            'identifier' => $admin->nia_pbsb,
            'password' => 'password',
        ])->assertSessionHasErrors('identifier');

        $this->assertGuest();
    }

    public function test_admin_dashboard_is_no_longer_available(): void
    {
        $this->get('/admin')->assertNotFound();
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'identifier' => $user->nia_pbsb,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
