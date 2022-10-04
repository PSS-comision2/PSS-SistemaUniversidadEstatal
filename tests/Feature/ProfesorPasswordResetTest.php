<?php

namespace Tests\Feature;

use App\Models\Profesor;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ProfesorPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('profesor/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $profesor = Profesor::factory()->create();

        $response = $this->post('profesor/forgot-password', [
            'email' => $profesor->email,
        ]);

        Notification::assertSentTo($profesor, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $profesor = Profesor::factory()->create();

        $response = $this->post('profesor/forgot-password', [
            'email' => $profesor->email,
        ]);

        Notification::assertSentTo($profesor, ResetPassword::class, function ($notification) {
            $response = $this->get('profesor/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $profesor = Profesor::factory()->create();

        $response = $this->post('profesor/forgot-password', [
            'email' => $profesor->email,
        ]);

        Notification::assertSentTo($profesor, ResetPassword::class, function ($notification) use ($profesor) {
            $response = $this->post('profesor/reset-password', [
                'token' => $notification->token,
                'email' => $profesor->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
