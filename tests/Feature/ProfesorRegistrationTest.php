<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfesorRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('profesor/register');

        $response->assertStatus(200);
    }

    public function test_new_profesors_can_register()
    {
        $response = $this->post('profesor/register', [
            'name' => 'Test Profesor',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('profesor');
        $response->assertRedirect(route('profesor.dashboard'));
    }
}
