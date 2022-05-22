<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_categories_index(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function test_check_categories_create(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertViewIs('admin.categories.create');
    }
}
