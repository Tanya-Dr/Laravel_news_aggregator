<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_user_get_auth(): void
    {
        $response = $this->get(route('user.auth'));

        $response->assertViewIs('user.auth');
    }

    public function test_check_user_post_auth(): void
    {
        $data = [
            'email' => 'Some email',
            'password' => 'Some password'
        ];
        $response = $this->post(route('user.auth'), $data);

        $response->assertRedirect(route('news'));
    }

    public function test_check_get_feedback(): void
    {
        $response = $this->get(route('user.feedback'));

        $response->assertStatus(200);
    }

    public function test_check_user_post_feedback(): void
    {
        $data = [
            'name' => 'Some name',
            'review' => 'Some review'
        ];
        $response = $this->post(route('user.feedback'), $data);

        $response->assertRedirect(route('news'));
    }

    public function test_check_get_dataUpload(): void
    {
        $response = $this->get(route('user.dataUpload'));

        $response->assertStatus(200);
    }

    public function test_check_user_post_dataUpload(): void
    {
        $data = [
            'name' => 'Some name',
            'email' => 'Some email',
            'info' => 'Some info',
            'phone' => 'Some phone'
        ];
        $response = $this->post(route('user.dataUpload'), $data);

        $response->assertSeeText('Order is processed');
    }
}
