<?php

namespace Tests\Feature;

use App\Models\Profesor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ProfesorEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $profesor = Profesor::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($profesor, 'profesor')->get('profesor/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $profesor = Profesor::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'profesor.verification.verify',
            now()->addMinutes(60),
            ['id' => $profesor->id, 'hash' => sha1($profesor->email)]
        );

        $response = $this->actingAs($profesor, 'profesor')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($profesor->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('profesor.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $profesor = Profesor::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'profesor.verification.verify',
            now()->addMinutes(60),
            ['id' => $profesor->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($profesor, 'profesor')->get($verificationUrl);

        $this->assertFalse($profesor->fresh()->hasVerifiedEmail());
    }
}
