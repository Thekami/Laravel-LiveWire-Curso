<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        // $user = User::factory()->create();
        $user = User::find(4);
        $this->actingAs($user);

        // Accede a la ruta '/'
        $response = $this->get('/propiedades');

        // Ahora sigue la redirección
        $response = $this->followingRedirects()->get('/actions');

        $response->assertStatus(200);
    }


}
