<?php

namespace Tests\Feature;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Menguji halaman yang tidak memerlukan login
        $url1 = $this->get('/');
        $url3 = $this->get('/login');
        $url4 = $this->get('/about');

        $url1->assertStatus(200);
        $url3->assertStatus(200);
        $url4->assertStatus(200);

        // Menguji redirect ke /login jika mencoba mengakses /posts tanpa login
        $url2 = $this->get('/posts');
        $url2->assertStatus(302); // Redirect terjadi
        $url2->assertRedirect('/login'); // Redirect ke halaman login

        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $this->get('/posts');
    }
}
