<?php

namespace Tests\Feature;

use App\Models\Profesor;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfesorAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('profesor/login');

        $response->assertStatus(200);
    }

    public function test_profesors_can_authenticate_using_the_login_screen()
    {
        $profesor = Profesor::factory()->create();

        $response = $this->post('profesor/login', [
            'email' => $profesor->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('profesor');
        $response->assertRedirect(route('profesor.dashboard'));
    }

    public function test_profesors_can_not_authenticate_with_invalid_password()
    {
        $profesor = Profesor::factory()->create();

        $this->post('profesor/login', [
            'email' => $profesor->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('profesor');
    }
}
