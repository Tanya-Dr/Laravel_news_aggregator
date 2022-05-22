<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_news_index(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_check_news_create(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_check_news_store()
    {
        $data = [
            'title' => 'Some title',
            'author' => 'Some author',
            'status' => 'ACTIVE',
            'description' => 'Some description'
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertJson($data)->assertStatus(201);
    }
}
